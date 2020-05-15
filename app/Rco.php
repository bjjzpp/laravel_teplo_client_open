<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rco extends Model
{
    protected $fillable = ['title', 'full_text', 'map', 'rso'];

    public function rco_files()
    {
        return $this->hasMany('App\RcoFile', 'rco_id', 'id');
    }

    public function rco_maps()
    {
        return $this->hasMany('App\RcoMap', 'rco_id', 'id');
    }
}
