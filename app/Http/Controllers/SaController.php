<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sa;

class SaController extends Controller
{
    public function sa(){
        $sadata = sa::all();
        
        return view('sa', compact('sadata'));
    }
}
