<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abon extends Model
{
    protected $fillable = ['title', 'full_text'];

    public function abon_files()
    {
        return $this->hasMany('App\AbonFile');
    }
}
