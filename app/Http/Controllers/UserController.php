<?php

namespace App\Http\Controllers;

use App\Mail\UserVerificatin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function showRegister(){
        return view('user/Register');
    }

    public function register(){
        $this->validate(\request(), [
                'user'=>'required|min:6|alpha_dash|unique:users,name',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|confirmed',

            ]);
       $user = User::create([
                'name'=>\request('user'),
                'email'=>\request('email'),
                'password'=> bcrypt(\request('password')),
        ]);
        $code = sha1(rand(10000,90000));
       $user->userVerify()->create([
           'code'=> $code
       ]);

       $generatedUrl = route('verifyEmail',[$user->email,$code]);
       Mail::to($user->email)->send(new UserVerificatin($generatedUrl));

        return redirect(route('loginShow'));
    }

    public function verifyUser($email,$code){
        $user = User::where('email',$email)->first();

        if ($user){
                $userCode = $user->userVerify->code;
                if($userCode == $code){
                    $user->update([
                       'email_verified' =>  'yes'
                    ]);
                    $user ->userVerify->delete();
                    return 'user Verified !';
                }
        }else{
            return 'Unauthorized!';
        }
    }
}
