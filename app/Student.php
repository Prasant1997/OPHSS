<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';

    public function users(){
        return $this -> belongsTo('App\User','student_id');
    }

    public function classes(){
        return $this -> belongsTo('App\Classes','class_id');
    }

}
