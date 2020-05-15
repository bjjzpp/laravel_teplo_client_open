<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LktsLsCharge extends Model
{
    protected $fillable = [
        'id_lkts_ls', 
        'title', 
        'debt',
        'advance_pay_begin', 
        'pay', 
        'charge', 
        'payPeriod', 
        'flag_write', 
        'created_at'
    ];

    protected $dates = ['created_at'];

    public function lkts_ls()
    {
        return $this->belongsTo('App\LktsLs');
    }
}
