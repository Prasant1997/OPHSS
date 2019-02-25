<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'staff';

    public function users(){
        return $this -> belongsTo('App\User','staff_id');
    }
}
