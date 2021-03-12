<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Wallet;
use App\Models\Currency;
use App\Models\Transaction;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    /**
     * The relationships between models
     *
     * @var array
     */

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    public function role()
    {
        return $this->belongsToMany(Role::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function currency()
    {
        return $this->hasMany(Currency::class);
    }


    /*
    * Define the Users Role
    */
    public function isAdmin()
    {
         return $this->role()->where('role', 'admin')->exists();
    }

    public function isNoob():bool
    {
        if ($this->role()->role = 'noob') {
            return true;
          }
         return false ;
    }

    public function isElite():bool
    {
        if ($this->role()->role = 'elite') {
            return true;
          }
         return false ;
    }

    public function getIsAdminAttribute()
    {
        return $this->isAdmin();
    }
}


