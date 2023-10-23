<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Bier;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BierManager extends Controller{

    public function showBeerUpdate($id)
    {
        if(Auth::check() && Auth::user()->role == "admin"){
            $bier = Bier::find($id);
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

        // Verwijder de gebruiker
        $user->delete();

        return redirect()->route('adminifyShow')->with('success', 'Gebruiker is succesvol verwijderd.');
    }

    public function deleteBier($id){
        $bier = Bier::find($id);

        if(!$bier){
            return redirect()->route('home')->with('error', 'Gebruiker niet gevonden.');
        }

        $bier->delete();

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

        if(!$bier){
            return redirect()->route('home')->with('error', 'Bier niet gevonden.');
        }

        return view("bestellenPage",compact("bier"));
    }

    public function addToCart(Request $request, $bier_id){
    $quantity = $request->input('quantity');
    // Valideer $quantity zoals eerder besproken.

    $user = Auth::user();
    $bier = Bier::find($bier_id);

    if (!$bier) {
        return redirect()->route('showBestelling', ['id' => $bier_id])->with('error', 'Bier niet gevonden.');
    }

    $user->winkelkar->winkelkar_bieren()->attach($bier_id, ['quantity' => $quantity]);

    return redirect()->route('home')->with('success', 'Bier is toegevoegd aan de winkelmand.');
    }
}
?>
