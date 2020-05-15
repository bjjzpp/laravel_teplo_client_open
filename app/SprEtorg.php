<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SprEtorg extends Model
{
    public function goszaks()
    {
        return $this->hasOne('App\Goszak');
    }
}
