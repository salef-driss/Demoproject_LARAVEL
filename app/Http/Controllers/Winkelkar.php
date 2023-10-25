<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
