<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConnConsumersFile extends Model
{
    protected $fillable = ['conn_consumer_id', 'nfiles', 'pfiles', 'dfiles'];

    public function conn_consumer()
    {
        return $this->belongsTo('App\ConnConsumer');
    }
}
