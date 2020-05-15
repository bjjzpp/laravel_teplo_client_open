<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConnConsumer extends Model
{
    protected $fillable = ['title', 'full_text'];

    public function conn_consumers_files()
    {
        return $this->hasMany('App\ConnConsumersFile');
    }
}
