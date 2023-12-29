<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Bier;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BierManager extends Controller{

    public function showBeerUpdate($id)
    {
        if(Auth::check() && Auth::user()->role == "admin"){
            $bier = Bier::find($id);
            if($bier->status == 2){
                abort(404);
            }
            return view('updateBeer', compact('bier'));
        }else{
            return view("updateBeer")->with("error", "Geen toegang tot deze pagina, je hebt geen admin-rechten.");
        }
    }

    public function BeerUpdatePost(Request $request, $id)
    {

            if ($request->hasFile('bierimage')) {
                $request->validate([
                    'naam' => 'required',
                    'prijs' => 'required|numeric',
                    'stok' => 'required|integer',
                    'bierimage' => 'image|mimes:png,PNG,jpg,jpeg,png,JPG,JPEG',
                ]);

                $beer = Bier::find($id);


                if (!$beer) {
                    return redirect()->route('your.error.route')->with('error', 'Beer not found'); // Handle the case where the beer is not found
                }

                $image = $request->file('bierimage');
                $extension = $image->getClientOriginalExtension(); // Get the file extension
                $imageName = time() . '.' . $extension; // Generate a unique image name
                $image->move(public_path("images"), $imageName); // Store the image in the 'public/images' directory

                $beer->naam = $request->naam;
                $beer->prijs = $request->prijs;
                $beer->stok = $request->stok;
                $beer->bierimage = $imageName;

                $beer->save(); // Save the changes to the database

                return redirect()->route('showUpdate', ['id' => $id]); // Redirect back to the update page
            } else {
                $request->validate([
                    'naam' => 'required',
                    'prijs' => 'required|numeric',
                    'stok' => 'required|integer'
                ]);

                $beer = Bier::find($id);

                if (!$beer) {
                    return redirect()->route('your.error.route')->with('error', 'Beer not found'); // Handle the case where the beer is not found
                }

                $beer->naam = $request->naam;
                $beer->prijs = $request->prijs;
                $beer->stok = $request->stok;

                $beer->save(); // Save the changes to the database

                return redirect()->route('showUpdate', ['id' => $id]); // Redirect back to the update page
            }

    }


    public function deleteUser($id){
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('adminifyShow')->with('error', 'Gebruiker niet gevonden.');
        }
        $user->status = 2;
        $user->save();

        return redirect()->route('adminifyShow')->with('success', 'Gebruiker is succesvol verwijderd.');
    }

    public function deleteBier($id){
        $bier = Bier::find($id);

        if(!$bier){
            return redirect()->route('home')->with('error', 'Cant find this Beer');
        }

        $bier->status = 2;
        $bier->save();

        return redirect()->route('home')->with('success', 'Gebruiker is succesvol verwijderd.');

    }


    public function addBierShow(){
        return view("addBeer");
    }

    public function addBierPost(Request $request){
        $request->validate([
            'naam' => 'required',
            'prijs' => 'required|numeric',
            'stok' => 'required|integer',
            'bierimage' => 'image|mimes:png,jpg,jpeg',
        ]);

        $beer = new Bier();
        $beer->naam = $request->naam;
        $beer->prijs = $request->prijs;
        $beer->stok = $request->stok;

        if ($request->hasFile('bierimage')) {
            $image = $request->file('bierimage');
            $extension = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $extension;
            $image->move(public_path('images'), $imageName);
            $beer->bierimage = $imageName;
        }else{
            $beer->bierimage = 'default4.jpg';
        }

        $beer->save();

        return redirect()->route('showAddBier')->with('success', 'Beer has been added!');

    }

    public function showBestelling($id){
        $bier = Bier::find($id);
        $teveelBier = "";


        if(!$bier){
            return redirect()->route('home')->with('error', 'Bier niet gevonden.');
        }

        return view("bestellenPage",compact("bier", "teveelBier"));
    }

    public function addToCart(Request $request, $bier_id){
    $quantity = $request->input('quantity');
    // Valideer $quantity zoals eerder besproken.

    $user = Auth::user();
    $bier = Bier::find($bier_id);

    if (!$bier) {
        return redirect()->route('showBestelling', ['id' => $bier_id])->with('error', 'Bier niet gevonden.');
    }

    foreach($user->winkelkar as $winkelkar){
        if($winkelkar->status == 1)
        {
            $activeCart = $winkelkar;
            break;
        }
    }

    if ($bier->stok < $quantity) {
        $teveelBier = "Niet genoeg voorraad beschikbaar.";
        return redirect()->route('showBestelling', ['id' => $bier_id])->with( 'error', $teveelBier);
    }

    DB::beginTransaction();

    try {
        // Voeg het bier toe aan de winkelkar
        $activeCart->winkelkar_bieren()->attach($bier_id, ['quantity' => $quantity]);

        // Werk de voorraad van het bier bij
        $bier->decrement('stok', $quantity);

        // Commit de transactie als beide stappen succesvol zijn
        DB::commit();

        return redirect()->route('showWinkelkar')->with('success', 'Bier is toegevoegd aan de winkelmand.');
    } catch (\Exception $e) {
        // Rollback de transactie als er een fout optreedt
        DB::rollback();

        return redirect()->route('showWinkelkar')->with('error', 'Er is een fout opgetreden bij het toevoegen van het bier aan de winkelmand.');
    }
    }
}
?>
