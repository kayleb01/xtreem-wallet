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
        $transactions = Transaction::where('user_id', auth()->id())->take(5)->get();
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
                'currency' => $request->currency_id,
                'user_id' => auth()->id(),
                'amount' => $request->amount,
                'flw_ref' => $request->flw_ref,
                'tx_ref' => $request->tx_ref
            ]);
             return new TransactionResource($transaction);
    }

    public function update(Request $request, Transaction $transaction)
    {
        $this->isAdmin();

        $this->validateRequest($request);
        $query = $transaction->update($request->all());
        if ($query) {
            # Return response if  updated successfully...
              return  response()->json([
                        'message' => 'Transaction updated'
                         ], 301);
        }else{

            return  response()->json([
                'message' => 'Error updating record, please try again later'
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

    public function transactions()
    {
        return view('all-transaction');
    }
}

