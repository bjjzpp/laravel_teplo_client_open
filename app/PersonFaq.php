<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonFaq extends Model
{
    protected $fillable = [
        'faq_in_date', 
        'person', 
        'person_email', 
        'faq_in_text', 
        'faq_out_date', 
        'faq_out_text', 
        'faq_out_ts',
        'faq_out_files', 
        'status',
        'geoip'
    ];
}
