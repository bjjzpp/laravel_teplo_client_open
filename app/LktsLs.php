<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LktsLs extends Model
{
    protected $fillable = [
        'id_lkts_users', 
        'id_maps',
        'ls_user_active',
        'ls',
        'ls_gis_gkx',
        'lastname',
        'firstname',
        'middlename',
        'pin',
        'company', 
        'office', 
        'coun_people', 
        'houseroom', 
        'houseroom_non_resident',
        'houseroom_general',
        'ticket_ver',
        'pin_active'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_lkts_users', 'id');
    }

    public function lkts_ls_pus()
    {
        return $this->hasMany('App\LktsLsPu', 'id_lkts_ls', 'id');
    }

    public function lkts_ls_dogs()
    {
        return $this->hasMany('App\LktsLsDog', 'id_lkts_ls', 'id');
    }

    public function rco_maps()
    {
        return $this->belongsTo('App\RcoMap', 'id_maps', 'id');
    }

    public function lkts_ls_puots()
    {
        return $this->hasMany('App\LktsLsPuot', 'id_lkts_ls', 'id');
    }

    public function lkts_ls_charges()
    {
        return $this->hasMany('App\LktsLsCharge', 'id_lkts_ls', 'id');
    }

    public function users_ls()
    {
        return $this->hasOne(UsersLs::class);
    }
}
