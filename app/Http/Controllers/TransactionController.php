<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Resources\TransactionResource;

class TransactionController extends Controller
{
    public function index()
    {
        if(auth()->user()->isAdmin){
            $transactions = Transaction::with('user')->paginate(20);
            return TransactionResource::collection($transactions);
        }
        $transactions = Transaction::where('user_id', auth()->id())->paginate(20);
        return TransactionResource::collection($transactions);

    }

    public function show($id)
    {
        $transaction = Transaction::where('transaction_id', $id)->with('currency')->get();
        return TransactionResource::collection($transaction);

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'transaction_id' => 'required',
            'action'         => 'required',
            'currency_id'    => 'required',
            'amount'         => 'required'
        ]);
            $transaction = Transaction::create([
                'transaction_id' => $request->transaction_id,
                'action' => $request->action,
                'currency_id' => $request->currency_id,
                'user_id' => auth()->id(),
                'amount' => $request->amount
            ]);
             return new TransactionResource($transaction);
    }
}
