<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        return auth()->user()->isAdmin;
    if (!auth()->user()->isAdmin) {
        #Administrators are not to have wallets
     $wallet = Wallet::where('user_id', auth()->user()->id)->with('user', 'currency')
                    ->get();
    }else{
        $users  = User::all()->except([auth()->user()->id]);
    }

    $transactions = Transaction::where('user_id', auth()->user()->id)->paginate(15);
    return response([
        'data' => [(!$wallet ? $users : $wallet), $transactions]
    ], 200);
    }
}
