<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsFile extends Model
{
    protected $fillable = [
        'nfiles', 
        'pfiles', 
        'dfiles'
    ];

    public function news()
    {
        return $this->belongsTo('App\News');
    }
}
