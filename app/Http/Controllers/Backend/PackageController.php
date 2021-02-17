<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Package;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
class PackageController extends Controller
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
        $packages = Package::all();
        if (session(  'success_message')){
            Alert::success('Success!', session( 'success_message')); 
        }
        
        return view('backend.packages.package', compact('packages'));
    }  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $package= null;
        return view('backend.packages.create',compact('package'));
    }




  
    public function store(Request $request)
    {
      
        // Package::create($request->all())
           
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'overview' => 'required|min:5',
            'itineraries' => 'required|min:5',
            'cost_details' => 'required|min:5',
            'practical_info' => 'required|min:5',
            'cost' => 'numeric',
            'image.*' => 'image|max:1999|required'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
      
        
        $package = new Package();
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
            
         
            Storage::disk('public')->putFileAs('images/package/', $image, $imageName, $saveImage->encode());
            // Storage::put('public/images/package/', $saveImage, $imageName);
            // dd('here');
            $data[$key] = $imageName;
            
        }

        $package->name = $request->name;
        $package->cost = $request->cost;
        $package->overview = $request->overview;
        $package->description = $request->description;
        $package->itineraries = $request->itineraries;
        $package->cost_details = $request->cost_details;
        $package->practical_info = $request->practical_info;

        $data = implode(', ', $data);
        $package->image = $data;

        $package->save();

        return redirect()->route('package.store')->withSuccessMessage('Packages created successfully');


    }


  
    public function show($id)
    {
        $package = Package::findOrFail($id);
        return view('backend.packages.view', compact('package'));
    }





 
    public function edit($id)
    {
        
        $package= Package::find($id);
        return view('backend.packages.edit')->with('package', $package);

    
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
        $package = Package::find($id);
        if (!$package) {
            return redirect()->route('package.create')->with("error", 'no package');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'overview' => 'required|min:5',
            'itineraries' => 'required|min:5',
            'cost_details' => 'required|min:5',
            'practical_info' => 'required|min:5',
            'cost' => 'numeric',
            'image.*' => 'image|max:1999'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        if($request->has('image')){

            foreach(explode(', ', $package->image) as $image){
                Storage::disk('public')->delete('images/package/' .$image);
            }

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
           
                Storage::disk('public')->putFileAs('images/package/', $image, $imageName, $saveImage->encode());
                $data[$key] = $imageName;
             }  
             $data = implode(', ', $data);
                $package->image = $data;
         }

        $package->name = $request->name;
        $package->cost = $request->cost;
        $package->overview = $request->overview;
        $package->description = $request->description;
        $package->itineraries = $request->itineraries;
        $package->cost_details = $request->cost_details;
        $package->practical_info = $request->practical_info;
        $package->save();

        return redirect()->route('package.store')->withSuccessMessage( 'Packages edited successfully'); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $package = Package::findOrFail($request->package_id);   
        foreach(explode(', ', $package->image) as $image){
            Storage::disk('public')->delete('images/package/' .$image);
        }  
        $package->delete();
        return redirect()->route('package.index')->withSuccessMessage( 'Packages deleted successfully');
    }
}
