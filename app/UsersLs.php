<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersLs extends Model
{
    protected $fillable = [
        'id_user',
        'id_lkts_ls',
        'pin'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lkts_ls()
    {
        return $this->belongsTo(LktsLs::class);
    }
}