<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanFile extends Model
{
    protected $fillable = ['fz_plan_id', 'nfiles', 'fpatch', 'fdata', 'oldfile'];

    public function plan_files()
    {
        return $this->belongsTo('App\FzPlan');
    }
}
