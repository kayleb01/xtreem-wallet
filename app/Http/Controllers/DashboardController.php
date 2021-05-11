<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Wallet;
use App\Models\Transaction;
use App\Http\Resources\UserResources;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

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
        $reference = Flutterwave::generateReference();
        $public_key = config('flutterwave.publicKey');
        // dd($public_key);
        return view('index')->with(['reference' => $reference, 'public_key' => $public_key]);
    }

    public function user()
    {
        return response()->json(auth()->user(), 200);
    }
}

