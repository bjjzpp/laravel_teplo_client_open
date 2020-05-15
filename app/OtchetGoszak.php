<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtchetGoszak extends Model
{
    protected $fillable = ['year_id', 'ztext', 'fz_id'];

    public function otchet_files()
    {
        return $this->hasMany('App\OtchetFile', 'otchet_gz_id', 'id');
    }

    public function yeargoszak()
    {
        return $this->belongsTo('App\Yeargoszak', 'year_id', 'id');
    }

    public function fz()
    {
        return $this->belongsTo('App\Fz', 'fz_id', 'id');
    }
}
