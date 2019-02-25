<?php
use App\Classes;
use App\User;
use App\Subjects;
use App\Events;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    $event = Events::all()->sortByDesc('id');
    $event = DB::select(DB::raw("SELECT * FROM (
    SELECT * FROM events ORDER BY id DESC LIMIT 4
) sub
ORDER BY id ASC
        "));
//    DD($event);
//    $events = (object) $event;
//    DD();

    $student = User::all()->where('type', 'student');
    $staff = User::all()->where('type', 'staff');
    $class = Classes::all();
    $subject = Subjects::all();
    return view('welcome')->with('events', $event)->with('staffs', $staff)->with('students', $student)->with('classes', $class)->with('subjects', $subject);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/view_events', 'HomeController@student_event')->middleware('student');
Route::get('/staff_view_events', 'HomeController@staff_event')->middleware('staff');
Route::get('/error', 'HomeController@error');

//Add Teacher
Route::group(['middleware' => ['admin']], function()
{
    Route::resource('/add_teacher','TeacherController');
});

//Add Student
Route::group(['middleware' => ['admin']], function()
{
    Route::resource('/add_student','StudentController');
    Route::get('/forget_password/{id}','StudentController@forget')->name('password');
    Route::post('/reset/{id}','StudentController@reset')->name('reset');
});

//Add events
Route::group(['middleware' => ['admin']], function()
{
    Route::resource('/add_event','EventController');
});

//Add routine
Route::group(['middleware' => ['admin']], function()
{
    Route::resource('/add_routine','RoutineController');
});

//Add subject
Route::group(['middleware' => ['admin']], function()
{
    Route::resource('/add_subject','SubjectsController');
});

//Add classes
Route::group(['middleware' => ['admin']], function()
{
    Route::resource('/add_class','ClassesController');
});



//Staff Routine
Route::group(['middleware' => ['staff']], function()
{
    Route::resource('/staff_routine','StaffRoutineController');
});

//Staff Detail
Route::group(['middleware' => ['staff']], function()
{
    Route::resource('/staff_profile','TeacherProfileController');
});



//Student Profile
Route::group(['middleware' => ['student']], function()
{
    Route::resource('/student_profile','StudentDetailController');
});

//Student Detail Routine
Route::group(['middleware' => ['student']], function()
{
    Route::resource('/student_routine','StudentRoutineController');
});