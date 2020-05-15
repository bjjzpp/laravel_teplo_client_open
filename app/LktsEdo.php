<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LktsEdo extends Model
{
    protected $fillable = ['id_lkts_users','edo_date_in','edo_name_object','edo_date_out','edo_out','edo_frm','edo_out_lk','edo_out_close'];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_lkts_users', 'id');
    }

    public function lkts_edo_files()
    {
        return $this->hasMany('App\LktsEdoFile', 'lkts_edo_files_id', 'id');
    }

    public function lkts_edo_logs()
    {
        return $this->hasMany('App\LktsEdoLog', 'lkts_edo_id', 'id');
    }
}
