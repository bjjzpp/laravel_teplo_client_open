<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RcoFile extends Model
{
    protected $fillable = ['rco_id', 'nfiles', 'pfiles', 'dfiles'];

    public function Rco()
    {
        return $this->belongsTo('App\Rco');
    }
}
