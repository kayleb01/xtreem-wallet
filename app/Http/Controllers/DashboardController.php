<?php

namespace App\Http\Controllers;

use App\Http\Resources\Dashboard;
use App\Http\Resources\DashboardResources;
use App\Http\Resources\UserResources;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function index()
    {

        if (!auth()->user()->isAdmin) {

        $transactions = Transaction::where('user_id', auth()->user()->id)->paginate(15);
        $wallet = Wallet::where('user_id', auth()->user()->id)
                        ->with('user', 'currency')
                        ->get();
        return [$wallet, $transactions];

        }else{

        $users_data  = User::with('transaction', 'wallet')->all()->except([auth()->user()->id]);
        return UserResources::collection($users_data);

        }
    }

    public function show()
    {
    return view('index');
    }
}

