<?php

namespace App\Http\Controllers\Auth;

use App\Notifications\VerifyAccount;
use App\User;
use App\Http\Controllers\Controller;


// use App\Notifications\VerifyEmail;
use App\Http\Controllers\Auth\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{


    public function register(Request $request)
    {
        $validator =  $this->validate($request,[
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|confirmed'
        ]);
        if(!$validator){
            return redirect()->back();
        }

        $user= User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'token' => str_random(50),
        ]);

        $user->notify(new VerifyAccount($user->token));

        return redirect()->route('login')->with('VerificatiionError', 'Please verify your account.');
    }

    public function activate($token){

        User::where('token', $token)->update(['status' => true, 'email_verified_at' => Carbon::now(), 'token' => null]);

        return redirect()->route('login');

    }

    public function showRegistrationForm(){
        return view('auth.register');
    }
}
