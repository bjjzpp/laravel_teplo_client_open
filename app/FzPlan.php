<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FzPlan extends Model
{
    protected $fillable = ['year_id', 'ztext'];

    public function yeargoszak()
    {
        return $this->belongsTo('App\Yeargoszak', 'year_id', 'id');
    }

    public function fz_plans()
    {
        return $this->hasMany('App\PlanFile', 'fz_plan_id', 'id');
    }
}
