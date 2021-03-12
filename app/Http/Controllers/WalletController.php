<?php

namespace App\Http\Controllers;

use App\Http\Resources\WalletResource;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index()
    {
        $wallet = Wallet::where('user_id', auth()->user()->id)
        ->with('user', 'currency')
        ->get();
        return WalletResource::collection($wallet);
    }
}
