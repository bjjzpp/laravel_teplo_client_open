<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LktsLsChargePrint extends Model
{
    protected $fillable = [
        'id_lkts_ls_charges',
        'id_spr_uslugas',
        'kolvo',
        'summa'
    ];
}
