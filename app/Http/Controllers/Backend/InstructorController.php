<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Instructor;
use Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class InstructorController extends Controller
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
        $instructors = Instructor::all();
        if (session('success_message')) {
            Alert::success('Success!', session('success_message'));
        }
        return view('backend.instructor.index', compact('instructors'));
    }


    public function store(Request $request)
    {

        //dd($request);
        //Validation

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $filename = null;
        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $filename = str_random() . '.' . $file->getClientOriginalExtension();

            $imagePath = public_path('instructor/' . $filename);

            Image::make($file)->resize(290, 300)->save($imagePath);

        }


        $this->validate($request, [
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required',
        ]);

        //code for storing
        $instructor = new Instructor();
        $instructor->name = $request->name;
        $instructor->image = $filename;
        $instructor->designation = $request->designation;
        $instructor->description = $request->description;

        $instructor->save();


        return redirect()->back()->withSuccessMessage('Added successfully');
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request)
    {

        $instructor = Instructor::findOrFail($request->instructor_id);
        // dd($instructor);
        // $instructor->update($request->all());


        $filename = null;
        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $filename = str_random() . '.' . $file->getClientOriginalExtension();

            $imagePath = public_path('instructor/' . $filename);

            $image_path = public_path('instructor/' . $instructor->image);

            if (File::exists($image_path)) {
                // dd('there');
                File::delete($image_path);
            }

            Image::make($file)->resize(500, 500)->save($imagePath);


            $instructor->image = $filename;
        }

        $instructor->name = $request->name;
        $instructor->designation = $request->designation;
        $instructor->description = $request->description;

        $instructor->save();


        return back()->withSuccessMessage('Updated successfully');

    }

    public function delete(Request $request)
    {
        $instructor = Instructor::findOrFail($request->instructor_id);
        // dd($instructor);
        unlink(public_path('instructor/' . $instructor->image));
        $instructor->delete();

        return back()->withSuccessMessage('Deleted successfully');
    }
}
