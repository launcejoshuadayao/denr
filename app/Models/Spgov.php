<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spgov extends Model
{
    //
    protected $table = 'sp_government';
    
    protected $fillable = [
        'id_spgov',
        'applicant_name',
        'applicant_number',
        'referred_investigator',
        'patented_subsisting',
        'location',
        'survey_no',
        'remarks',        
    ];
}
