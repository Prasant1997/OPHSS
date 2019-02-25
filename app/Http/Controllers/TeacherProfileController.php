<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

use Image;

class TeacherProfileController extends Controller
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
        $staff = new Teacher;
        $staff->staff_id =  $request->staff_id;
        $staff->address =  $request->address;
        $staff->contact =  $request->contact;
        $staff->father =  $request->father;
        $staff->mother =  $request->mother;

        if($request->hasFile('image')){
            $profile = $request->file('image');
            $filename = $profile->getClientOriginalName();
            $location = public_path('images/staff_profile/' . $filename);
            Image::make($profile)->save($location);
            $staff->image = $filename;
        }

        $staff->gender =  $request->gender;
        $staff->Description =  $request->description;

        $staff->save();

        return redirect()->back()->with('success', 'Staff Detail Updated SuccessFully');
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
        $staff = Teacher::findOrFail($id);
        return view('staff.edit.edit_profile')->with('staffs', $staff);
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
        $staff = Teacher::findOrFail($id);
        $staff->staff_id =  $request->staff_id;
        $staff->address =  $request->address;
        $staff->contact =  $request->contact;
        $staff->father =  $request->father;
        $staff->mother =  $request->mother;

        if($request->hasFile('image')){
            $profile = $request->file('image');
            $filename = $profile->getClientOriginalName();
            $location = public_path('images/staff_profile/' . $filename);
            Image::make($profile)->save($location);
            $staff->image = $filename;
        }

        $staff->gender =  $request->gender;
        $staff->Description =  $request->description;

        $staff->save();

        return redirect('/home')->with('success', 'Staff Detail Updated SuccessFully');
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
