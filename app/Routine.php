<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    protected $table = 'routine';

    public function users(){
        return $this -> belongsTo('App\User','teacher_id');
    }

    public function classes(){
        return $this -> belongsTo('App\Classes','class_id');
    }

    public function subject(){
        return $this -> belongsTo('App\Subjects','subject_id');
    }
}
