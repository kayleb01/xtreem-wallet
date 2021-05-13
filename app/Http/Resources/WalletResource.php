<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WalletResource extends JsonResource
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
            'balance' => $this->balance,
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->first_name,
                'email'=> $this->user->email,
                'profile_photo_url' =>$this->user->profile_photo_url,
                'country' => $this->user->country
            ]

        ];
    }
}
