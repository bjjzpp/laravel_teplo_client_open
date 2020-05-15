<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TchemaFile extends Model
{
    public function tchemas()
    {
        return $this->belongsTo('App\Tchema');
    }
}
