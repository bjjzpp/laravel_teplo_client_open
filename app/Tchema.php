<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tchema extends Model
{
    public function tchema_files()
    {
        return $this->hasMany('App\TchemaFile','tchema_id','id');
    }
}
