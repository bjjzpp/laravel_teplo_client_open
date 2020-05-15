<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LktsEdoLog extends Model
{
    public function lkts_edos()
    {
        return $this->belongsTo('App\LktsEdo');
    }

}
