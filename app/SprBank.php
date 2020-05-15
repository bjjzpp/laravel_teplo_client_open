<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SprBank extends Model
{
    protected $fillable = [
        'bank',
        'mini_bank', 
        'bik',
        'psh', 
        'ksh',
        'flag', 
        'ticket_ver'
    ];

    public function pays()
    {
        return $this->hasOne('App\Pay');
    }

}
