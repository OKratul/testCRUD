<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function showLogin(){

        return view('User.Login');
    }

    public function login(){
            $this->validate(\request(),[
                'name'=>'required',
                'password'=>'required',
            ]);

            if (Auth::attempt([
                'name'=> \request('name'),
                'password' =>\request('password'), //accessor mutators
            ])
            ){
                return redirect()->route('contactList');
            }else{
                return redirect()->back()->with('loginError','Credential Does not match');
            }
    }

    public function logOut(){
        Auth::logout();

        return to_route('loginShow');
    }
}
