<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $table = 'subjects';

    public function routine(){
        return $this ->hasMany('App\Routine');
    }
}
