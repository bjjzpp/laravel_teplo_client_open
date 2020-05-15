<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RcoMap extends Model
{
    protected $fillable = [
        'rco_id', 
        'name', 
        'description', 
        'maps',
        'dfiles',
        'flag_sort', 
        'flag_pd', 
        'maps_active'
    ];

    public function Rco()
    {
        return $this->belongsTo('App\Rco');
    }

    public function lkts_ls()
    {
        return $this->hasOne('App\LktsLs');
    }
}
