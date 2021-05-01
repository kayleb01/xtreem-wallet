<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Transaction;
use Illuminate\Http\Request;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class FlutterwaveController extends Controller
{
   /**
     * Initialize Rave payment process
     * @return void
     */
    public function initialize()
    {
        //This generates a payment reference
        $reference = Flutterwave::generateReference();

        // Enter the details of the payment
        $data = [
            'payment_options' => request()->payment_option,
            'amount' => request()->amount,
            'email' => request()->email,
            'tx_ref' => $reference,
            'currency' => "NGN",
            'redirect_url' => route('callback'),
            'customer' => [
                'email' => request()->email,
                "phonenumber" => request()->phone,
                "name" => request()->name
            ],

            "customizations" => [
                "title" => 'Movie Ticket',
                "description" => "20th October"
            ]
        ];

        $payment = Flutterwave::initializePayment($data);

        if (!$payment) {
            // notify something went wrong
            return response()->json(['error' => 'an unexpected error occured, please try again after some few minutes']);
        }
             Transaction::create([
            'currency_id'       => $this->getCurrencyByType($data['currency']),
            'status'            => 0,
            'user_id'           => 1,
            'amount'            => $data['amount'],
            'created_at'        => now(),
            'tx_ref'            => $data['tx_ref']
        ]);
        return redirect($payment['link']);
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback()
    {

        $data = Flutterwave::verifyTransaction(request()->transaction_id);

        if ($data['status'] == "cancelled") {

                   return response()->json(['errorr' => 'Transaction Cancelled'], 500);
             }

        if (!empty($data) && $data['status'] == 'success') {

            $transaction = Transaction::where('tx_ref', $data['data']['tx_ref'])->first();
            if ($transaction['amount'] == $data['data']['amount']) {

                 if ($this->getCurrencyById($transaction['currency_id']) == $data['data']['currency']) {
                     //Update fields we didn't have data for before now
                        $transaction->update([
                            'transaction_id' => $data['data']['id'],
                            'payment_type' => $data['data']['payment_type'],
                            'device_fingerprint' => $data['data']['device_fingerprint'],
                            'status' => 1,
                            'ip' => $data['data']['ip']
                            ]);

                    return response()->json(['message' => 'Payment successful']);
                 }else{

                     return response()->json(['message' => 'Payment not successful, amount doesn\'t match']);
                 }
            }else{
                return response()->json(['message' => 'Payment not successful']);
            }

        }

    }

/**
 * Get the currency id by the type
 * returned from the transaction
 */
    public function getCurrencyByType($type ="")
    {
       if(!empty($type)){

            $currency = Currency::where('type', $type)->first();
            return $currency->id;
        }

    }

    public function getCurrencyById($id ="")
    {
        if(!empty($id)){

            $currency = Currency::where('id', $id)->first();
            return $currency->type;
        }

    }


    public function index()
    {
    return view('pay');
    }
}

