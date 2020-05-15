<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'email',
        'phone',
        'fax',
        'address',
        'metas',
        'counts',
        'copyright'
    ];
}
