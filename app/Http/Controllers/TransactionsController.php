<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Resources\TransactionResource;

class TransactionsController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id', auth()->id());
        return TransactionResource::collection($transactions);

        if(auth()->user()->isAdmin){
            $transactions = Transaction::with('user')->paginate(20);
        }
    }
}
