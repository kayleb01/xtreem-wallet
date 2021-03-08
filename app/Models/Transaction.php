<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;



    /*
    * Model relationships
    */
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
