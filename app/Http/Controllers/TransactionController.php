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
        $this->validateRequest($request);

            $transaction = Transaction::create([
                'transaction_id' => $request->transaction_id,
                'action' => $request->action,
                'currency_id' => $request->currency_id,
                'user_id' => auth()->id(),
                'amount' => $request->amount
            ]);
             return new TransactionResource($transaction);
    }

    public function update(Request $request, Transaction $transaction)
    {
        $this->isAdmin();

        $query = $transaction->update($request->all());
        if ($query) {
            # Return response if  updated successfully...
              return  response()->json([
                        'message' => 'Transaction updated'
                         ], 301);
        }else{

            return  response()->json([
                'message' => 'Error updating record, please contact the Administrator'
                 ], 500);
        }

    }

    public function destroy(Transaction $transaction)
    {
    $this->isAdmin();
    $transaction->delete();

    return response()->json(['message' => 'Deleted'], 200);

    }

    public function isAdmin()
        {
            if (!auth()->user()->isAdmin) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        }

    /**
     * Validate requests
     */
    public function validateRequest($request)
    {
        $this->validate($request, [
            'transaction_id' => 'required',
            'action'         => 'required',
            'currency_id'    => 'required',
            'amount'         => 'required|numeric'
        ]);
    }
}
