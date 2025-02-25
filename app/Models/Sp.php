<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use HasFactory;

class Sp extends Model
{
    protected $table = 'sp';
    
    protected $fillable = [
        'id_sp',
        'applicant_name',
        'applicant_number',
        'referred_investigator',
        'patented_subsisting',
        'sector',
        'location',
        'survey_no',
        'remarks',        
    ];
}
