<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtchetFile extends Model
{
    protected $fillable = ['otchet_gz_id', 'fpatch', 'fdata', 'oldfile'];

    public function otchet_goszaks()
    {
        return $this->belongsTo('App\OtchetGoszak');
    }
}
