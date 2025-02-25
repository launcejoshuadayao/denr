<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use HasFactory;

class Spschool extends Model
{
    //

    protected $table = 'sp_school';

    protected $fillable = [
        'id_spschool',
        'applicant_name',
        'applicant_number',
        'referred_investigator',
        'patented_subsisting',
        'location',
        'survey_no',
        'remarks',   
    ];

}
