<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\user;
class SocialAuthFacebookController extends Controller
{

   use AuthenticatesUsers;

   /**
    * Where to redirect users after login.
    *
    * @var string
    */
   protected $redirectTo = '/';

   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
       $this->middleware('guest')->except('logout');
   }

   /**
    * Redirect the user to the GitHub authentication page.
    *
    * @return \Illuminate\Http\Response
    */
   public function redirect($provider)
   {
       return Socialite::driver($provider)->redirect();
   }

   /**
    * Obtain the user information from GitHub.
    *
    * @return \Illuminate\Http\Response
    */
   public function callback($provider)
   {
       $user = Socialite::driver($provider)->stateless()->user();
       $existingUser = User::whereEmail($user->getEmail())->first();
       if($existingUser) {
           auth()->login($existingUser);
           return redirect($this->redirectPath());
       }
       
       $newUser=User::create([
           'name'=>$user->getName(),
           'email'=>$user->getEmail(),
           'password'=>bcrypt('5yr20mfds03223')
        
       ]);

       auth()->login($newUser);
       return redirect($this->redirectPath());

   }
}
