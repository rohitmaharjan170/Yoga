<?php

namespace App\Http\Controllers\Backend;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Homeslider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class HomesliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
       $homeslider = Homeslider::all();
       if (session(  'success_message')){
        Alert::success('Success!', session( 'success_message')); 
    }
       return view('backend.homeslider.homeslider',compact('homeslider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $homeslider = null;
        return view('backend.homeslider.create',compact('homeslider'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
         
            'carousel_caption_title' => 'required',
            'carousel_caption_detail' => 'required|min:5',
       
            'image.*' => 'image|max:1999'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
 
    
        $homeslider = new Homeslider();
        $images = $request->file('image');
        foreach ($images as $key => $image) {
            $ext = $image->getClientOriginalExtension();
            $imageName = str_random() . "." . $ext;
            $make = \Intervention\Image\Facades\Image::make($image);
            $width=$make->width();
            $saveImage = $make->fit($width,500, function ($constraint) {
                $constraint->upsize();
                $constraint->aspectRatio();
            });
           
         
            Storage::disk('public')->putFileAs('images/homeslider/', $image, $imageName, $saveImage->encode());
  
            // dd('here');
            $data[$key] = $imageName;
           
        }

        $homeslider->carousel_caption_title = $request->carousel_caption_title ;
        $homeslider->carousel_caption_detail = $request->carousel_caption_detail;
        
        $data = implode(', ', $data);
        $homeslider->image = $data;
        $homeslider->save();
    
        return redirect()->route('homeslider.store')->withSuccessMessage( 'Added successfully'); 
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            // dd('here');
            $homeslider = Homeslider::findOrFail($id);   
            foreach(explode(', ', $homeslider->image) as  $image){
                Storage::disk('public')->delete('images/homeslider/' .$image);
            }  
            $homeslider->delete();
            return redirect()->route('homeslider.index')->withSuccessMessage( 'Deleted successfully');
    }
}
