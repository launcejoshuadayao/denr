<?php

namespace App\Http\Controllers;
use App\Models\Accounts;

use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(){
        return view('dashboard');
    }

//login
public function loginUser(Request $request){
    try{
        $username = $request->input('username');
        $password = $request->input('myInput');
        $users = Accounts::where('username', $username)
        ->where('password', $password)->first();
    if($users){
        if($users->userType == 'Superadmin'){
            return redirect('login')->with('success', 'Successfully logged in!');
        }
        else{
            // return view('dashboard');
            return view('dashboard')->with('success', 'Successfully logged in!');
        }
    }
    
        else{
    return back()->with('message', 'Wrong username or password!');
        }
    }
    catch(Exception $e){
        // dd($e);
        return back()->with('message', 'Something went wrong');
    }

}


}
