<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Winkelkar;

use Illuminate\Support\Facades\Auth;



class OrderManager extends Controller
{

    public function showOrders()
    {
        $user = Auth::user();
        $winkelkaren = $user->winkelkar()->where('status', 2)->get();

        return view("Order", ['user' => $user, 'winkelkaren' => $winkelkaren]);
    }

    public function createOrder(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            $winkelkar = $user->winkelkar()->where('status', 1)->first();

            if ($winkelkar) {
                $winkelkar->status = 2;
                $winkelkar->save();

                $newWinkelkar = new Winkelkar();
                $newWinkelkar->status = 1;
                $user->winkelkar()->save($newWinkelkar);

                return redirect()->route('showOrders')->with('success', 'Order has been placed.');
            }
        }

        return redirect()->route('showOrders')->with('error', 'Failed to place the order.');
    }
}
