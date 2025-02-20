<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    //
    protected $table = 'users';
    
    protected $fillable = [
        'id',
        'username',
        'password',
        'role',
              
    ];
}
