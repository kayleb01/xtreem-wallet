<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['currency_id', 'transaction_id', 'amount', 'action', "status", 'tx_ref', 'flw_ref', 'device_fingerprint', 'ip', 'user_id'];

    /*
    * Model relationships
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
