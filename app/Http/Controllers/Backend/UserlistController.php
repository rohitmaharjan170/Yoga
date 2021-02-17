<?php


namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        
        $users = User::all();
       return view('backend.users.userlist', compact('users'));
       
       
    }
}
