<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'transaction_id' => $this->transaction_id,
            'action' => $this->action,
            'status' => $this->status,
            'amount' => number_format($this->amount / 100, 2, '.', ','),
            'created_at' => $this->created_at,
            'currency' => [
                'type' => $this->currency->type,
                'country' => $this->currency->country
            ]

        ];
    }
}
