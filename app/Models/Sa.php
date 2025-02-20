<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sa extends Model
{
    protected $table = 'sa';
    
    protected $fillable = [
        'applicant_name',
        'applicant_number',
        'on_process_rejected_approve',
        'location',
        'survey_no',
        'remarks',        
    ];
}
