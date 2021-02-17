<?php

namespace App\Http\Controllers\Frontend;

use App\Booking;
use App\YogaClass;
use App\YogaType;
use Illuminate\Http\Request;
use App\Package;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Instructor;
use Auth;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class PagesController extends Controller
{
    public function userprofile()
    {
        $user=  Auth::user();
        $package = DB::table('packages')
        ->join('booking','packages.id','=','booking.package_id')
        ->where('user_id',auth()->id())
        ->select('packages.name as pname','booking.*')
        ->get();


        return view('frontend.user_dashboard.userdashboard',compact('user','package'));
    }
    public function update(Request $request, $id)
    {
        Alert::toast('Updated successfully ', 'Toast Type')->position('top-right');
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]); 
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
       
        $user->save();

        return redirect()->back();
    }





    public function index()
    {
        $homeslider = DB::table('homesliders')->get();
        $trainer = DB::table('instructors')->get();
        $classlist = DB::table('yogatypes')->get();
        $packages = DB::table('packages')->orderBy('name', 'asc')->get();
        if(session('success_message')){
            Alert::toast(session('success_message'),'success');
        }
        return view('frontend.pages.index', compact('classlist', 'trainer', 'packages', 'homeslider'));
    }


    public function about()
    {
        if(session('success_message')){
            Alert::toast(session('success_message'),'success');
        }
        $trainer = DB::table('instructors')->get();
        return view('frontend.pages.about', compact('trainer'));
    }


    public function Contact()
    {
        if(session('success_message')){
            Alert::toast(session('success_message'),'success');
        }
        $enquiry = DB::table('enquiries')->orderBy('name', 'asc')->get();
        return view('frontend.pages.contact', compact('enquiry'));
    }
    public function YogaNepal()
    {
        if(session('success_message')){
            Alert::toast(session('success_message'),'success');
        }
        return view('frontend.pages.yogaNepal');
    }

    public function PrivateClass()
    {
        if(session('success_message')){
            Alert::toast(session('success_message'),'success');
        }
        return view('frontend.pages.private');
    }

    public function gallery()
    {
        if(session('success_message')){
            Alert::toast(session('success_message'),'success');
        }
        $gallery = DB::table('galleries')->orderBy('id', 'asc')->get();
        return view('frontend.pages.gallery', compact('gallery'));
    }


    public function singleclass()
    {
        if(session('success_message')){
            Alert::toast(session('success_message'),'success');
        }
        return view('frontend.pages.singleclass');
    }

    public function packages()
    {
        if(session('success_message')){
            Alert::toast(session('success_message'),'success');
        }
        $packages = DB::table('packages')->orderBy('name', 'asc')->paginate(5);
        return view('frontend.pages.packages', compact('packages'));
    }

    //full package description
    public function singlePackage($id)
    {
        if(session('success_message')){
            Alert::toast(session('success_message'),'success');
        }
        $packages = Package::orderBy('name', 'asc')->get()->where('id', $id);
        return view('frontend.pages.singlepackage', compact('packages'));
    }

    public function booking()
    {
        if(session('success_message')){
            Alert::toast(session('success_message'),'success');
        }
        $bookings = Booking::all();
        return view('backend.bookings.bookingdetail', compact('bookings'));
    }

    public function classSchedule()
    {
        if(session('success_message')){
            Alert::toast(session('success_message'),'success');
        }
        $schedule = YogaClass::select('time', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday')->get();
        return view('frontend.pages.schedule', compact('schedule'));
    }

    public function classlist()
    {
        if(session('success_message')){
            Alert::toast(session('success_message'),'success');
        }
        $classlist = YogaType::paginate(5);
        return view('frontend.pages.classlist', compact('classlist'));
    }


    public function yogadescription($id)
    {
        // dd($id);
        if(session('success_message')){
            Alert::toast(session('success_message'),'success');
        }
        $singleclass = YogaType::where('id', $id)->get();

        // dd($singleclass);
        return view('frontend.pages.yogadescription', compact('singleclass'));


    }

    public function trainer()
    {
        if(session('success_message')){
            Alert::toast(session('success_message'),'success');
        }
        $trainer = Instructor::select('name', 'image', 'designation', 'description')->get();
        // dd($trainer);
        return view('frontend.pages.trainer', compact('trainer'));
    }

    public function packageSearch()
    {
        $searchText = Input::get('searchText');
        if ($searchText != "") {
            $package = Package::where('name', 'LIKE', '%' . $searchText . '%')->paginate(5);
            $paginate = $package->appends(array(
                'searchText' => Input::get('searchText')
            ));
            if (count($package) > 0) {
                return view('frontend/pages/search')->withDetails($package)->withQuery($searchText);
            } else
                return view('frontend/pages/search')->withDetails($package)->withQuery($searchText)->withMessage('No Details found. Try to search again !');
        }
        return view('frontend/pages/search')->withMessage('No Details found. Try to search again !');
    }
    public function privacy()
    {
        if(session('success_message')){
            Alert::toast(session('success_message'),'success');
        }
        return view('frontend.pages.privacy');
    }

}
