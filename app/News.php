<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'id_news',
        'title_news', 
        'body_news',
        'created_at'
    ];

    public function news_files()
    {
        return $this->hasMany('App\NewsFile');
    }
}
