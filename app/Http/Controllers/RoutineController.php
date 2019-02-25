<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Routine;
use App\User;
use App\Subjects;
use App\Classes;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routine = Routine::all();
        $user = User::all()->where('type', 'staff');
        $subject = Subjects::all();
        $class = Classes::all();
        return view('admin.routine')->with('routine', $routine)->with('users', $user)->with('subjects', $subject)->with('classes', $class);
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
//        DD($request->end_time);
        $routine = new Routine;
        $routine->teacher_id = $request->teacher_id;
        $routine->subject_id = $request->subject_id;
        $routine->class_id = $request->class_id;
        $routine->start_time = $request->start_time;
        $routine->end_time = $request->end_time;
        $routine->remarks = $request->remarks;

        $routine->save();
        return redirect()->back()->with('success', 'Routine Set Successfully !!!');
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
        $routine = Routine::findOrFail($id);
        $class = Classes::all();
        $user = User::all()->where('type', 'staff');
        $subject = Subjects::all();
        return view('admin.edit.edit_routine')->with('routine', $routine)->with('classes', $class)->with('users', $user)->with('subjects', $subject);
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
        $routine = Routine::findOrFail($id);
        $routine->teacher_id = $request->teacher_id;
        $routine->subject_id = $request->subject_id;
        $routine->class_id = $request->class_id;
        $routine->start_time = $request->start_time;
        $routine->end_time = $request->end_time;
        $routine->remarks = $request->remarks;

        $routine->save();
        return redirect()->route('add_routine.index')->with('success', 'Routine Updated Successfully !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $routine = Routine::findOrFail($id);
        $routine->delete();
        return redirect()->back()->with('success', "Routine deleted sucessfully!!!");
    }
}
