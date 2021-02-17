<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\YogaClass;
use App\YogaType;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Input;

class YogaClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function list()
    {
        $yogaclasses = YogaClass::all();
        
        $yogatypes = YogaType::all();
        if (session(  'success_message')){
            Alert::success('Success!', session( 'success_message')); 
        }
        return view('backend.yogaclass.list', compact('yogaclasses','yogatypes'));
    }

    public function classstore(Request $request)
    {
        // dd($request->all());
        $yogaclass = new YogaClass();
        $yogaclass->time= $request->input('time');
        $yogaclass->sunday = $request->input('sunday');
        $yogaclass->monday = $request->input('monday');
        $yogaclass->tuesday = $request->input('tuesday');
        $yogaclass->wednesday = $request->input('wednesday');
        $yogaclass->thursday = $request->input('thursday');
        $yogaclass->friday = $request->input('friday');
        $yogaclass->saturday = $request->input('saturday');

        $yogaclass->save();
        
        return redirect()->back()->withSuccessMessage( 'Added successfully');
    }

    public function classupdate(Request $request)
    {
        $yogaclass = YogaClass::findOrFail($request->yogaclass_id);
        $yogaclass->update($request->all());
        
        return back()->withSuccessMessage( 'Updated successfully');
    }

    public function classdelete(Request $request)
    {
        
        $yogaclass = YogaClass::findOrFail($request->yogaclass_id);
        $yogaclass->delete();
        
        return back()->withSuccessMessage( 'Deleted successfully');
    }


}
