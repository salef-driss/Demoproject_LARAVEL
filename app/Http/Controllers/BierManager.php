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
        if (Auth::check() && Auth::user()->role == "admin") {
            if ($request->hasFile('bierimage')) {
                $request->validate([
                    'naam' => 'required',
                    'prijs' => 'required|numeric',
                    'stok' => 'required|integer',
                    'bierimage' => 'image|mimes:png,PNG',
                ]);

                $beer = Bier::find($id);


                if (!$beer) {
                    return redirect()->route('your.error.route')->with('error', 'Beer not found'); // Handle the case where the beer is not found
                }

                $image = $request->file('bierimage');
                $extension = $image->getClientOriginalExtension(); // Get the file extension
                $imageName = time() . '.' . $extension; // Generate a unique image name
                $image->storeAs('public/images', $imageName); // Store the image in the 'public/images' directory

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
        } else {
            return view("login");
        }
    }
}
?>
