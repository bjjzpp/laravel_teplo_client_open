<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StandartBf extends Model
{
    protected $fillable = ['standart_type_id', 'year_id', 'ztext'];

    public function standart_type()
    {
        return $this->belongsTo('App\StandartType');
    }

    public function yeargoszak()
    {
        return $this->belongsTo('App\Yeargoszak', 'year_id', 'id');
    }

    public function standart_bf_files()
    {
        return $this->hasMany('App\standartBfFile');
    }
}
