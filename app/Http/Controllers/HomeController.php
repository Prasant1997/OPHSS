<?php

namespace App\Http\Controllers;

use App\Routine;
use Illuminate\Http\Request;
use App\User;
use App\Subjects;
use App\Classes;
use App\Events;
use App\Student;
use App\Teacher;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'student', 'staff']);
        if($request->user()->hasRole('admin')){
            $staff = User::all()->where('type', 'staff');
            $student = User::all()->where('type', 'student');
            $subject = Subjects::all();
            $class = Classes::all();
            $event = Events::all()->SortByDesc('id');
            return view('home')->with('staffs', $staff)->with('students', $student)->with('subjects', $subject)->with('classes', $class)->with('events', $event);
        }
        if($request->user()->hasRole('student')) {
            $student = User::all()->where('type', 'student');
            $profile = Student::all()->where('student_id', Auth::User()->id);
            $class = Classes::all();
//            DD($profile);
            return view('student.student')->with('students', $student)->with('profile', $profile)->with('classes', $class);
        }
        if($request->user()->hasRole('staff')) {
            $staff = User::all()->where('type', 'staff');
            $profile = Teacher::all()->where('staff_id', Auth::User()->id);
            $class = Classes::all()->where('class_teacher', Auth::User()->id);
//            DD($class);
            return view('staff.staff')->with('$staffs', $staff)->with('profile', $profile)->with('classes', $class);
        }

    }

    public function student_event(){
        $event = Events::all()->SortByDesc('id');
        return view('student.student_event')->with('events', $event);
    }

    public function staff_event(){
        $event = Events::all()->SortByDesc('id');
        return view('staff.staff_event')->with('events', $event);
    }

    public function error(){
        return view('error.error');
    }
}
