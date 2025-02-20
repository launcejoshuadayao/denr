<?php

namespace App\Http\Controllers;
use App\Models\Accounts;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountsController extends Controller
{
    //

    public function manageAccount() {
        
        $accountData = Accounts::all();

        foreach($accountData as $account){
            
        }

        return view('account', compact('accountData'));
    }

    public function createAccount(Request $request){
        
        $username = $request->input('username');
        $password = $request->input('password'); 
        $role = $request->input('role');
        $data=array('username'=>$username,"password"=>$password,"role"=>$role);
        DB::table('users')->insert($data);
       
        return back();
    }
}
