<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Role;

use App\Student;

use App\Classes;

use Image;
use DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all()->where('type', 'student');
        $student = Student::all();
        $class = Classes::all();
        $unpro = DB::select(DB::raw("SELECT * FROM users u 
            WHERE NOT EXISTS
                (
                SELECT *
                FROM student s
                WHERE u.id = s.student_id
                )
                    "));
        return view ('admin.student')->with('users', $user)->with('students', $student)->with('classes', $class)->with('unpros', $unpro);
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
//        DD($request->type);
        $student = new User;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = bcrypt($request->password);
        $student->type = $request->type;
        $student->remember_token = $request->_token;
        $student->save();
        $student
            ->roles()
            ->attach(Role::where('name', 'student')->first());

        return redirect()->back()->with('success', 'Student Added Successfully !!!');
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
        return view('admin.edit.edit_student')->with('students', $student)->with('classes', $class);
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

        return redirect()->route('add_student.index')->with('success', 'Student Detail Updated SuccessFully');
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

    public function forget($id){
        $student = User::findOrFail($id);
        $class = Classes::all();
        return view('admin.edit.edit_password')->with('students', $student)->with('classes', $class);
    }

    public function reset(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
        ]);
//        echo ($id);
        $student = User::findOrFail($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = bcrypt($request->password);
        $student->type = $request->type;
        $student->save();

        return redirect()->route('add_student.index')->with('success', 'Password updated Successfully !!!');
    }
}
