<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Package;
use App\Booking;
use App\YogaClass;
use App\Instructor;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $packageCount = Package::all()->count();
        $yogaClassCount = YogaClass::all()->count();
        $bookingCount = Booking::all()->count();
        $userCount = User::all()->count();
        return view('backend.user_dashboard.dashboard',compact('packageCount','yogaClassCount','bookingCount','userCount'));

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // 
    }

    public function edit($id)
    {
        //
    }

   
}

