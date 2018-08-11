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
        $json_permission = '{"article":{"read":"yes","edit:"yes","delete":"yes","update":"yes"},"question":{"read":"yes","edit":"yes","delete":"yes", "update":"yes"},"exam":{"read":"yes","edit" :"yes","delete":"yes","update":"yes"},"license_type":{"read":"yes","edit" :"yes","delete":"no","update":"yes"},"license_rank":{"read":"yes","edit":"yes","delete":"no","update":"yes"},"user":{"read":"no","edit":"no", "delete":"no","update":"no"},"config":{"read":"no","edit":"no","delete":"no","update":"no"}}';
        $role_employee = new Role();
	    $role_employee->name = 'employee';
	    $role_employee->description = 'A Employee User';
        $role_employee->slug = 'Employee';
        $role_employee->permissions = $json_permission;
	    $role_employee->save();
	    $role_manager = new Role();
	    $role_manager->name = 'manager';
	    $role_manager->description = 'A Manager User';
        $role_manager->slug = 'Manager';
        $role_manager->permissions = $json_permission;
	    $role_manager->save();
    }
}
