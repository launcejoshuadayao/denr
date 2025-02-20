<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fpa;

class FpaController extends Controller
{
    //

    public function fpa(){
        $fpadata = fpa::all();
        
        return view('fpa', compact('fpadata'));
    }

}
