<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Website\Notifications\SocialAccountService;
use Auth;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;



class LoginController extends Controller
{
    public function login(Request $request){

       $validator =  $this->validate($request,[
            'email'=>'required|email|exists:users',
            'password'=>'required|min:8'
        ]);
        if(!$validator){
            return redirect()->back();
        }
//        dump($validator);

        $email = $request->get('email');
        $password = $request->get('password');

        $userpassword=User::where('email',$email)->first()->password;

//
        if(Hash::check($password,$userpassword))
        {
//            dd('here');
            if (\Illuminate\Support\Facades\Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1])) {

                return redirect()->route('openingindex');
            }
            return redirect()->back()->with('VerificatiionError', 'Please verify your account.');
        }

        return redirect()->back()->with('CredentialError', 'Credentials doesnot match.');
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function userLogout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
