<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LktsLsDogFile extends Model
{
    protected $fillable = ['id_lkts_ls_dogs', 'nfiles', 'pfiles', 'defiles'];

    public function lkts_ls_dogs()
    {
        return $this->belongsTo('App\LktsLsDog');
    }
}
