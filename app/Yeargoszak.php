<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yeargoszak extends Model
{
    protected $fillable = ['title'];

    public function goszaks()
    {
        return $this->hasOne('App\Goszak');
    }

    public function standart_bfs()
    {
        return $this->hasOne('App\StandartBf');
    }

    public function fz_plans()
    {
        return $this->hasOne('App\FzPlan');
    }

    public function otchet_goszaks()
    {
        return $this->hasOne('App\OtchetGoszak');
    }
}
