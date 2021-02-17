<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enquiry;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin',['except' => ['store']]);
    }
    
    public function index()
    {
     
        
        $enquiry = Enquiry::all();
        if (session(  'success_message')){
            Alert::success('Success!', session( 'success_message')); 
        }
       return view('backend.Enquiry.enquiry',compact('enquiry'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        // return($request->all());
        // Enquiry::create($request->all());

        // $validator = Validator::make($request->all(), [
        
        //     'description' => 'requires|min:10'

        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withInput()->withErrors($validator);
        // }
      

        // $enquiry = new Enquiry();

        // $enquiry->id = $request->id;
        // $enquiry->name = $request->name ;
        // $enquiry->email = $request->email;
        // $enquiry->subject = $request->subject;
        // $enquiry->description = $request->description;

        // $enquiry->save();
        
        // return redirect()->back()->with('success', 'Booking done successfully');   
        
        
        
        
       
        $validator = Validator::make($request->all(), [
           
            'description' => 'required|min:10',
        ]);
    
          if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    
        $enquiry = new Enquiry();

        $enquiry->id = $request->id;
        $enquiry->name = $request->name ;
        $enquiry->email = $request->email;
        $enquiry->subject = $request->subject;
        $enquiry->description = $request->description;

        $enquiry->save();    
        return redirect()->back()->with('enquiry', 'true');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        // $enquiry = Enquiry::all();
        // return view('backend.Enquiry.view',compact('enquiry'));
        // $enquiry = Enquiry::orderBy('name', 'asc')->get()->where('id',$id);
        $enquiry = Enquiry::orderBy('name', 'asc')->get()->where('id',$id);
        return view('backend.Enquiry.view', compact('enquiry'));
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
        $enquiry = Enquiry::findOrFail($id);   
     
        $enquiry->delete();
        return redirect()->route('enquiry.index')->withSuccessMessage( 'Deleted successfully');;
    }
}
