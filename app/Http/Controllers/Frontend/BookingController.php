<?php

namespace App\Http\Controllers\Frontend;

use App\Booking;
use App\Mail\BookingMail;
use App\Package;
use User;
use Illuminate\Http\Request;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();
        if (session(  'success_message')){
            Alert::success('Success!', session( 'success_message')); 
        }
        return view('frontend.pages.booking')->with('bookings', $bookings);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $package = Package::where('id', $id)->select('id', 'name')->first();
        // dd($package->name);
        return view('frontend.pages.booking')->with('package', $package);
    }


  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 
    public function store(Request $request)
    { 
    //    return $request->all();
    Alert::Success('Booked Successfully ');

    $data = request()->validate( [
        'email' => 'required|email',
        'name' => 'required',
        'mobileNo' => 'required',
        'package_id' => 'required',
        'package_name' => 'required',
        'country' => 'required',
        'issueDate' => 'required|date|date_format:Y-m-d|before:today',
        'description' => 'required',
    ]);

    Mail::to($request->user())->send(new BookingMail( $data));
    Mail::to('sinorakhadka56@gmail.com')->send(new BookingMail( $data));
    // Mail::to(env('MSN_USERNAME'))->send(new BookinMail( $data));
    
 
    $user =Auth::user()->id;
    $booking = new Booking();
    $booking->user_id = $user;
    $booking->package_id = $request->package_id;
    $booking->name = $request->name;
    $booking->email = $request->email;
    $booking->mobileNo = $request->mobileNo;
    $booking->description = $request->description;
    $booking->country = $request->country;
    $booking->issueDate= $request->issueDate;

    $booking->save();

   
    
    return redirect()->back()->withSuccessMessage( 'Deleted successfully');
    //    Booking::create ($request->all());
    }



    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     //
    }
}
