<?php

use Illuminate\Database\Seeder;

use App\Admin;
use App\Role;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = Role::where('name', 'Employee')->first();
	    $role_manager  = Role::where('name', 'Manager')->first();
	    $employee = new Admin();
	    $employee->name = 'Employee Name';
	    $employee->email = 'employee@example.com';
	    $employee->password = bcrypt('123456');
	    $employee->save();
	    $employee->roles()->attach($role_employee);
	    $manager = new Admin();
	    $manager->name ='Thach Nguyen';
	    $manager->email = 'manager@example.com';
	    $manager->password = bcrypt('123456');
	    $manager->save();
	    $manager->roles()->attach($role_manager);
    }
}
