<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LktsLsDog extends Model
{
    protected $fillable = ['id_lkts_ls', 'dognumber', 'dbegin', 'dend'];

    public function lkts_ls()
    {
        return $this->belongsTo('App\LktsLs');
    }

    public function lkts_ls_dog_files()
    {
        return $this->hasMany('App\LktsLsDogFile', 'id_lkts_ls_dogs', 'id');
    }

}
