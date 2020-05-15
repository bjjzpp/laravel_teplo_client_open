<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StandartType extends Model
{
    protected $fillable = ['title'];

    public function standartbfs()
    {
        return $this->hasMany('App\StandartBf');
    }
}
