<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbonFile extends Model
{
    protected $fillable = ['abon_id', 'nfiles', 'pfiles', 'dfiles'];

    public function abon()
    {
        return $this->belongsTo('App\Abon');
    }
}
