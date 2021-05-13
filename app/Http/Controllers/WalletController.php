<?php

namespace App\Http\Controllers;

use App\Http\Resources\WalletResource;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index()
    {
        if (!auth()->user()->isAdmin) {
          $wallet = Wallet::where('user_id', auth()->id())
                    ->with('user')
                    ->get();

        return WalletResource::collection($wallet);
        }else{
            $res = response([
                'status' => 'error',
                'message' => 'Admin cannot have a wallet'
            ]);
            return json_encode($res);
        }

    }

    public function store(Request $request)
    {

        if (empty($request)) {

            return ['message' => 'Request is empty'];
        }

        $this->validate($request, [
            'balance' => 'required',
            'currency_id' => 'required'
        ]);
        $create = Wallet::create([
            'user_id' => auth()->id(),
            'balance' => $request->balance,
            'currency_id' => $request->currency_id
        ]);

        return new WalletResource($create);
    }
}
