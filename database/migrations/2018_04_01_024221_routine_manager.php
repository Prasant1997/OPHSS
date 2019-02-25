<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoutineManager extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_name');
            $table->string('type');
            $table->string('image');
            $table->string('date');
            $table->string('description');
            $table->string('remarks')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
//            $table->string('class_teacher');
            $table->unsignedInteger('class_teacher');
            $table->foreign('class_teacher')->references('id')->on('users');
            $table->string('remarks')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->string('remarks')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

//        Schema::create('teacher_subject', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('teacher_id');
//            $table->foreign('teacher_id')->references('id')->on('users');
//            $table->unsignedInteger('subject_id');
//            $table->foreign('subject_id')->references('id')->on('subjects');
//            $table->string('remarks')->nullable();
//            $table->rememberToken();
//            $table->timestamps();
//        });

        Schema::create('routine', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('users');
            $table->unsignedInteger('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->unsignedInteger('class_id');
            $table->foreign('class_id')->references('id')->on('classes');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('remarks')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('student', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->foreign('student_id')->references('id')->on('users');
            $table->unsignedInteger('class_id');
            $table->foreign('class_id')->references('id')->on('classes');
            $table->string('address');
            $table->string('contact');
            $table->string('father');
            $table->string('mother');
            $table->string('image');
            $table->string('gender');
            $table->string('Description')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('staff_id');
            $table->foreign('staff_id')->references('id')->on('users');
            $table->string('address');
            $table->string('contact');
            $table->string('father');
            $table->string('mother');
            $table->string('image');
            $table->string('gender');
            $table->string('Description')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
        Schema::dropIfExists('routine');
        Schema::dropIfExists('student');
        Schema::dropIfExists('staff');
        Schema::dropIfExists('classes');
        Schema::dropIfExists('subjects');

    }
}
