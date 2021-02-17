<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        //    validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);


        // Attempt log to the user in
        //returns true if successfull and false if unsuccessful, it automatically handles setting of the session
        //use if else stmt instead of this
        // it hash the pw itself so no need to hash the pw manually

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful then redirect to their intended location
            return redirect()->intended(route('admin.dashboard'));
        }
        //if unsuccessful then redirect to their intented locations
        return redirect()->back()->withInput($request->only('email', 'remember'));

    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/yoga/admin');
    }
}
