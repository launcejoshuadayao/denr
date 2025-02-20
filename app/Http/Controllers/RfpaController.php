<?php

namespace App\Http\Controllers;

use App\Models\Rfpa;
use Illuminate\Http\Request;

class RfpaController extends Controller
{
    public function rfpa(){
        $rfpadata = Rfpa::all();
        
        return view('rfpa', compact('rfpadata'));
    }
}
