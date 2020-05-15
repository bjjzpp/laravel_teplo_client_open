<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LktsLsPuFile extends Model
{
    protected $fillable = ['id_lkts_ls_pus', 'nfiles', 'pfiles', 'defiles'];

    public function lkts_ls()
    {
        return $this->belongsTo('App\LktsLs');
    }

    public function lkts_ls_pus()
    {
        return $this->belongsTo('App\LktsLsPu');
    }
}
