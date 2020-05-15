<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fz extends Model
{
    public function goszak()
    {
        return $this->hasOne('App\Goszak');
    }

    public function otchet_goszak()
    {
        return $this->hasOne('App\OtchetGoszak');
    }
}
