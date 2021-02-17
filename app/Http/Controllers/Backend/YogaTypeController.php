<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\YogaType;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Image;

class YogaTypeController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth:admin');
    }
    
    public function yogatype()
    {

        $yogatypes = YogaType::all();
        if (session(  'success_message')){
            Alert::success('Success!', session( 'success_message')); 
        }
        
       return view('backend.yogatype.yogatype', compact('yogatypes'));
    }

    public function typestore(Request $request)
    {
        
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
            $filename=null;
            if(Input::hasFile('image')){
            $file=Input::file('image');
            $filename = str_random().'.'.$file->getClientOriginalExtension();
            
            $imagePath=public_path('type/' .$filename);
            Image::make($file)->resize(900, 800)->save($imagePath);
            }

            $this->validate($request,[
                'name' =>'required',
                'description' => 'required',
            ]);
            
            //code for storing
        $yogatype=new YogaType();
        $yogatype->name=$request->name;
        $yogatype->image=$filename;
        $yogatype->description=$request->description;
            
        $yogatype->save();
             
        
                         
        return redirect()->back()->withSuccessMessage( 'Added successfully');
    }

    public function typeupdate(Request $request)
    {
        // dd($request->image);
        $yogatype = YogaType::findOrFail($request->yogatype_id);

        $filename=null;
        if(Input::hasFile('image')){
            $file=Input::file('image');
            $filename = str_random().'.'.$file->getClientOriginalExtension();
            
            $imagePath=public_path('type/' .$filename);

            $image_path = public_path('type/'.$yogatype->image);
            //dd($file);
            if(File::exists($image_path)){
                // dd('there');
                File::delete($image_path);
            }
            // dd('here');
            Image::make($file)->resize(900, 800)->save($imagePath);
            $yogatype->image=$filename;
        }
        // dd('here');
        // $yogatype->update($request->all());
        $yogatype->name=$request->name;
        $yogatype->description=$request->description;
        $yogatype->save();
        
        return back()->withSuccessMessage( 'Updated successfully');
    }

    public function typedelete(Request $request)
    {
        $yogatype = YogaType::findOrFail($request->yogatype_id);
        unlink(public_path('type/'.$yogatype->image) );
        $yogatype->delete();
        
        return back()->withSuccessMessage( 'Deleted successfully');
    }
}

