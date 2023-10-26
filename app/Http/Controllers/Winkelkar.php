<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Winkelkar extends Controller
{
    public function showWinkelkar(){

       $user = Auth::user();

       if ($user) {

           $winkelkar = $user->winkelkar;

           if ($winkelkar) {

            $Bieren = $winkelkar->winkelkar_bieren;

               return view("winkelkar", compact('Bieren'));
           }
       }

       // Als de gebruiker niet is ingelogd of geen winkelkar heeft, toon een lege winkelkar
       return view("winkelkar", compact('Bieren'));
    }

    public function deleteFromCart($id){
        $user = Auth::user();

        if ($user) {
            $winkelkar = $user->winkelkar;

            if ($winkelkar) {
                // Find the pivot table row with the specified ID and delete it
                DB::table('winkelkar_bier')->where('id', $id)->delete();

                return redirect()->route('showWinkelkar')->with('success', 'Bier is verwijderd uit de winkelkar.');
            }
        }

        return redirect()->route('showWinkelkar')->with('error', 'Er is iets misgegaan bij het verwijderen van het bier uit de winkelkar.');
    }
}
