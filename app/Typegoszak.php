<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typegoszak extends Model
{
    protected $fillable = ['typename'];

    public function goszaks()
    {
        return $this->hasOne('App\Goszak');
    }
}
