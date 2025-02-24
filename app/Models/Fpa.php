<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use HasFactory;
class Fpa extends Model
{
    protected $table = 'fpa';
    
    protected $fillable = [
        'id_fpa',
        'applicant_name',
        'applicant_number',
        'referred_investigator',
        'patented_subsisting',
        'location',
        'survey_no',
        'remarks',        
    ];
}
