<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LktsLsPuot extends Model
{
    protected $fillable = ['id_lkts_ls', 'title', 'comm_del', 'created_at'];

    public function lkts_ls()
    {
        return $this->belongsTo('App\LktsLs');
    }
}
