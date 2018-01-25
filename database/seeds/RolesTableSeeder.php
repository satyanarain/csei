<?php

//use DB;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('permission_role')->truncate();
    	DB::table('role_user')->truncate();
        DB::table('roles')->truncate();

        $role = new Role();
        $role->name = 'administrator';
        $role->display_name = 'Administrator';
        $role->description = 'Administrator is having authority to access entire system.';
        $role->save();

        $role = new Role();
        $role->name = 'state-administrator';
        $role->display_name = 'State Administrator';
        $role->description = 'State administrator is having authority to access entire system for a particular state.';
        $role->save();

        $role = new Role();
        $role->name = 'operator';
        $role->display_name = 'Operator';
        $role->description = 'Operator is having authority to generate ticket for a particular state he/she belongs to.';
        $role->save();
    }
}
