<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';

    public function users(){
        return $this -> belongsTo('App\User','class_teacher');
    }

    public function routine(){
        return $this ->hasMany('App\Routine');
    }
    public function student(){
        return $this ->hasMany('App\Student');
    }
}
