<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classes;

use App\User;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = Classes::all();
        $user = User::all()->where('type', 'staff');
        return view('admin.classes')->with('classes', $class)->with('users', $user);
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
        $this->validate($request, [
            'class_teacher' => 'required|unique:classes',
        ]);
        $class = new Classes;
        $class->name = $request->class;
        $class->class_teacher = $request->class_teacher;
        $class->remarks = $request->remarks;

        $class->save();

        return redirect()->back()->with('success', 'Class Added Successfully !!!');
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
        $classe = Classes::findOrFail($id);
        $classes = Classes::all();
        $user = User::all()->where('type', 'staff');
        return view ('admin.edit.edit_class')->with('classe', $classe)->with('users', $user)->with('classes', $classes);
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
        $classes = Classes::findOrFail($id);
        $classes->name = $request->class;
        $classes->class_teacher = $request->class_teacher;
        $classes->remarks = $request->remarks;

        $classes->save();

        return redirect()->route('add_class.index')->with('success', 'Class updated Successfully !!!');
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
            $classes = Classes::findOrFail($id);
            $classes->delete();
            return redirect()->back()->with('success', "Class deleted sucessfully!!!");
        }
        catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->with("success", "Cannot delete a class as class id has been used somewhere!!!");
        }
    }
}
