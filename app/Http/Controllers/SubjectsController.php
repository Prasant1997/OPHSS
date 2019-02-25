<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subjects;
use App\Classes;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subjects::all();
        $class = Classes::all();
        return view('admin.subjects')->with('subjects', $subjects)->with('classes', $class);
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
//        DD($request->subject);
        $subject = new Subjects;
        $subject->subject = $request->subject;
        $subject->remarks = $request->remarks;

        $subject->save();

        return redirect()->back()->with('success', 'Subject Added Successfully !!!');
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
        $subject = Subjects::findOrFail($id);
        $class = Classes::all();
        return view('admin.edit.edit_subjects')->with('subjects', $subject)->with('classes', $class);
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
        $subject = Subjects::findOrFail($id);
        $subject->subject = $request->subject;
        $subject->remarks = $request->remarks;

        $subject->save();

        return redirect()->route('add_subject.index')->with('success', 'Subject Updated Successfully !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $subject = Subjects::findOrFail($id);
            $subject->delete();
            return redirect()->back()->with('success', "Subject deleted sucessfully!!!");
        }
        catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->with("success", "Cannot delete a Subject as subject id has been used somewhere!!!");
        }
    }
}
