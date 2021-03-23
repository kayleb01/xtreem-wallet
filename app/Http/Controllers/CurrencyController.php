<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Resources\CurrencyResource;

class CurrencyController extends Controller
{

    public function index()
    {
        $currency = Currency::get();
        return CurrencyResource::collection($currency);

    }

    public function store(Request $request)
    {

     $this->isAdmin();

     $this->validate($request, [
         'type' => 'required',
         'exchange_rate' => 'required',
         'country' => 'required'
     ]);

     $currency = Currency::create([
         'type' => $request->type,
         'exchange_rate' => $request->exchange_rate,
         'country' => $request->country

     ]);
     return new CurrencyResource($currency);

    }


    /**
     * The $id represent the currency model
     * for the {id} passed through the route
     * Using route model binding we the data
     * for the request and send back response
     */
    public function show(Currency $id)
    {
        return new CurrencyResource($id);
    }

    public function update(Request $request, Currency $currency)
    {
        $this->isAdmin();

        $this->validate($request, [
            'type' => 'required',
            'exchange_rate' => 'required|numeric',
            'country' => 'required'
        ]);

        $update = $currency->update([
            'type' => $request->type,
            'exchange_rate' => $request->exchange_rate,
            'country' => $request->country
        ]);
        if ($update) {
            # Return response if  updated successfully...
              return  response()->json([
                        'message' => 'Currency updated'
                         ], 301);
        }else{

            return  response()->json([
                'message' => 'Error updating record, please contact the Administrator'
                 ], 500);
        }

    }

    /***
     * Check if the user sending the request
     * is an admin, then delete
     */
    public function destroy(Currency $currency)
        {
            $this->isAdmin();

            $currency->delete();

            return response()->json(['message' => 'Deleted'], 200);

        }

        public function isAdmin()
        {
            if (!auth()->user()->isAdmin) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        }

}
