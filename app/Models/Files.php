<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Files extends Model
{
    use HasFactory;
    //
    protected $table = 'files';
    protected $fillable = ['applicantname', 'applicationType', 'file_name', 'file_path'];
}
