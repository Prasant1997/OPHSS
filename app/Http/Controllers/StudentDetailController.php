<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;

use Image;

use App\Classes;

class StudentDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        DD($request->address);
        $student = new Student;
        $student->student_id =  $request->student_id;
        $student->class_id =  $request->class;
        $student->address =  $request->address;
        $student->contact =  $request->contact;
        $student->father =  $request->father;
        $student->mother =  $request->mother;

        if($request->hasFile('image')){
            $profile = $request->file('image');
            $filename = $profile->getClientOriginalName();
            $location = public_path('images/student_profile/' . $filename);
            Image::make($profile)->save($location);
            $student->image = $filename;
        }

        $student->gender =  $request->gender;
        $student->Description =  $request->description;

        $student->save();

        return redirect()->back()->with('success', 'Student Detail Updated SuccessFully');
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
        $student = Student::findOrFail($id);
        $class = Classes::all();
        return view('student.edit.edit_details')->with('students', $student)->with('classes', $class);
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
        $student = Student::findOrFail($id);
        $student->student_id =  $request->student_id;
        $student->class_id =  $request->class;
        $student->address =  $request->address;
        $student->contact =  $request->contact;
        $student->father =  $request->father;
        $student->mother =  $request->mother;

        if($request->hasFile('image')){
            $profile = $request->file('image');
            $filename = $profile->getClientOriginalName();
            $location = public_path('images/student_profile/' . $filename);
            Image::make($profile)->save($location);
            $student->image = $filename;
        }

        $student->gender =  $request->gender;
        $student->Description =  $request->description;

        $student->save();

        return redirect('/home')->with('success', 'Student Detail Updated SuccessFully');
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
