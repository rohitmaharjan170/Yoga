<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Gallery;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
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
       $gallery = Gallery::all();
       if (session(  'success_message')){
        Alert::success('Success!', session( 'success_message')); 
    }
       return view('backend.gallery.gallery',compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gallery = null;
        return view('backend.gallery.create',compact('gallery'));   
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
       
            'image.*' => 'image|max:1999'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
 
    
        $gallery = new Gallery();
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
           
         
            Storage::disk('public')->putFileAs('images/gallery/', $image, $imageName, $saveImage->encode());
  
            // dd('here');
            $data[$key] = $imageName;
           
        }

        $gallery->id = $request->id;
        
        $data = implode(', ', $data);
        $gallery->image = $data;
        $gallery->save();
    
        return redirect()->route('galleries.store')->withSuccessMessage( 'Added successfully'); 
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
            $gallery= Gallery::findOrFail($id);   
            foreach(explode(', ', $gallery->image) as  $image){
                Storage::disk('public')->delete('images/gallery/' .$image);
            }  
            $gallery->delete();
            return redirect()->route('galleries.index')->withSuccessMessage( 'Deleted successfully');
    }
}
