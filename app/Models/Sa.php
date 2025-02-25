<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use HasFactory;
class Sa extends Model
{
    protected $table = 'sa';
    
    protected $fillable = [
        'id_sa',
        'applicant_name',
        'applicant_number',
        'on_process_rejected_approve',
        'location',
        'survey_no',
        'remarks',        
    ];
}
