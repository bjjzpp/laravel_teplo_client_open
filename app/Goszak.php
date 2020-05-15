<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goszak extends Model
{
    public function goszak_types()
    {
        return $this->belongsTo('App\GoszakType', 'goszak_types_id', 'id');
    }

    public function yeargoszak()
    {
        return $this->belongsTo('App\Yeargoszak', 'year_id', 'id');
    }

    public function typegoszaks()
    {
        return $this->belongsTo('App\Typegoszak', 'typegoszak_id', 'id'); 
    }

    public function fzs()
    {
        return $this->belongsTo('App\Fz', 'fz_id', 'id'); 
    }

    public function spr_etorgs()
    {
        return $this->belongsTo('App\SprEtorg', 'etorg_id', 'id'); 
    }


    public function fz223_files() 
    {
        return $this->hasMany('App\Fz223File', 'goszak_id', 'id');
    }

    public function fz223_contracts() 
    {
        return $this->hasMany('App\Fz223Contract', 'goszak_id', 'id');
    }
}
