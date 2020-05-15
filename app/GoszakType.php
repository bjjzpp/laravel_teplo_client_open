<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoszakType extends Model
{
    public function goszaks()
    {
        return $this->hasOne('App\Goszak');
    }
}
