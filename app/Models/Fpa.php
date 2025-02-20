<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fpa extends Model
{
    protected $table = 'fpa';
    
    protected $fillable = [
        'fpa_ID',
        'applicant_name',
        'applicant_number',
        'referred_investigator',
        'patented_subsisting',
        'location',
        'survey_no',
        'remarks',        
    ];
}
