<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fz223File extends Model
{
    public function goszaks()
    {
        return $this->belongsTo('App\Goszak');
    }
}
