<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LktsLsPu extends Model
{
    protected $fillable = ['id_lkts_ls', 'namepu', 'numberpu', 'dizg'];

    public function lkts_ls()
    {
        return $this->belongsTo('App\LktsLs');
    }

    public function lkts_ls_pu_files()
    {
        return $this->hasMany('App\LktsLsPuFile', 'id_lkts_ls_pus', 'id');
    }
}
