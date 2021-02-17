<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Website\Notifications\SocialAccountService;
use Auth;

use App\Notifications\PasswordResetNotification;
use App\Notifications\PasswordResetSuccessNotification;
use App\Http\Controllers\Auth\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class PasswordResetController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('guest');
//    }

    public function showResetForm(Request $request)
    {
        return view('frontend.passwordReset.passwordReset');
    }

    public function Resetresponse(Request $request, $token = null)
    {

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            "email" => "required|email",
        ]);
        if (!$validator) {
            return redirect()->back();
        }

        $user = User::where("email", $request->get("email"))->first();

        if (!$user) {

            return redirect()->back()->with('error', 'Email not found.');

        }
        $user->token = str_random(50);
        $user->update();

        $user->notify(new PasswordResetNotification($user->token));

        Session::flash('msg', 'Verification link is send');
        return view('frontend.passwordReset.passwordReset');

    }


    public function resetPassword(Request $request)
    {

        $validator = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ]);
        if (!$validator) {
            return redirect()->back();
        }

        $user = User::where("token", $request->get('token'))->first();

        if (!$user) {
            return redirect()->back()->withErrors('error', 'User not found.');
        }


        $user->token = null;

        $user->password = Hash::make($request->get('password'));

        $user->save();

//        $user->notify(new PasswordResetSuccessNotification());

        Session::flash('resetmsg', 'Your password has been reset');
        return redirect('/login');

    }


    public function showconfirmResetForm($token)
    {
        $user = User::where("token", $token)->select('email')->first();
        $email = $user->email;
        return view('frontend.passwordReset.confirmPasswordReset', compact('token', 'email'));

    }

    protected function guard()
    {
        return Auth::guard();
    }

}
