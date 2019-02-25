<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role_user;
use App\Role;
use App\Classes;
use DB;
use App\Teacher;
use Image;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $user = User::all()->where('type', 'staff');
        $user =DB::table('users')
            ->select('users.id','users.email','users.name','staff.id as sid','staff.address', 'staff.contact', 'staff.father', 'staff.mother', 'staff.image', 'staff.gender')
            ->join('staff','staff.staff_id','=','users.id')
//            ->join('staff','staff.staff_id','=','users.id' )
            ->get();
//        $user =  DB::select(DB::raw("SELECT , u.email, u.name, c.name AS class,
//        FROM users u, classes c
//        WHERE u.id = c.class_teacher
//        "));
        $class = Classes::all();
        $staff = Teacher::all();
        $unpro = DB::select(DB::raw("SELECT * FROM users u 
            WHERE NOT EXISTS
                (
                SELECT *
                FROM staff s
                WHERE u.id = s.staff_id
                )
                    "));
        return view ('admin.teacher')->with('users', $user)->with('classes', $class)->with('staffs', $staff)->with('unpros', $unpro);
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $teacher = new User;
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->password = bcrypt($request->password);
        $teacher->type = $request->type;
        $teacher->remember_token = $request->_token;
        $teacher->save();
            $teacher
                ->roles()
                ->attach(Role::where('name', 'staff')->first());

        return redirect()->back()->with('success', 'Staff Added Successfully !!!');

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
        $user = User::all()->where('id', $staff->staff_id);
//        DD($user);
        $class = Classes::all();
        return view('admin.edit.edit_staff')->with('staffs', $staff)->with('classes', $class)->with('users', $user);
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

        return redirect()->route('add_teacher.index')->with('success', 'Staff Detail Updated SuccessFully');
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
