<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name = 'admin';
        $admin->description = 'Super Admin';
        $admin->save();

        $staff = new Role();
        $staff->name = 'staff';
        $staff->description = 'Employees of the School';
        $staff->save();

        $customer = new Role();
        $customer->name = 'student';
        $customer->description = 'Students of the school';
        $customer->save();
    }
}
