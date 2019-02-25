<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = Role::where('name', 'admin')->first();
        $staffs = Role::where('name', 'staff')->first();
        $students  = Role::where('name', 'student')->first();

        $admin = new User();
        $admin->name = 'Prashant AD';
        $admin->email = 'adhikariprashant55@gmail.com';
        $admin->password = bcrypt('prashant');
        $admin->type = 'admin';
        $admin->save();
        $admin->roles()->attach($admins);

        $teacher = new User();
        $teacher->name = 'Prajil Shrestha';
        $teacher->email = 'prajil@gmail.com';
        $teacher->password = bcrypt('prajil');
        $teacher->type = 'staff';
        $teacher->save();
        $teacher->roles()->attach($staffs);

        $student = new User();
        $student->name = 'Unish Maharjan';
        $student->email = 'unish@gmail.com';
        $student->password = bcrypt('unish');
        $student->type = 'student';
        $student->save();
        $student->roles()->attach($students);
    }
}
