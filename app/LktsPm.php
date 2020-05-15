<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LktsPm extends Model
{
    protected $fillable = ['id_lkts_users','pm_date_in','pm_in','pm_date_out','pm_out','status'];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_lkts_users', 'id');
    }
}
