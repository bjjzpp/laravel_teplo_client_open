<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'lastname', 
        'middlename', 
        'email', 
        'password', 
        'geo_ip', 
        'mobile',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function lkts_pm()
    {
        return $this->hasOne('App\LktsPm');
    }

    public function lkts_edo()
    {
        return $this->hasOne('App\LktsEdo');
    }

    public function lkts_ls()
    {
        return $this->hasOne('App\LktsLs');
    }

    public function users_ls()
    {
        return $this->hasOne(UsersLs::class);
    }
}
