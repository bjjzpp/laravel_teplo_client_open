<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LktsEdoFile extends Model
{
    public function lkts_edos()
    {
        return $this->belongsTo('App\LktsEdo');
    }
}
