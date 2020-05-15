<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class standartBfFile extends Model
{
    protected $fillable = ['standart_bf_id', 'nfiles', 'pfiles', 'dfiles'];

    public function standart_bfs()
    {
        return $this->belongsTo('App\standartBfFile');
    }
}
