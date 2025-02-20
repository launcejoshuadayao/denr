<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use HasFactory;
class msa extends Model
{
    //
  
    protected $table = 'msa';
    
    protected $fillable = [
        'id_msa',
        'applicant_name',
        'applicant_number',
        'patented_subsisting',
        'location',
        'survey_no',
        'remarks',        
    ];

    public $timestamp = false;
}
