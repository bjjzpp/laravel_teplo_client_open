<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    protected $fillable = [
        'id_spr_bank', 
        'title',
        'body',
        'default'
    ];

    public function spr_bank()
    {
        return $this->belongsTo('App\SprBank', 'id_spr_bank', 'id');
    }
}
