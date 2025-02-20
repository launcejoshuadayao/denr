<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tsa;

class TsaController extends Controller
{
    public function tsa(){
        $tsadata = tsa::all();
        
        return view('tsa', compact('tsadata'));
    }
}
