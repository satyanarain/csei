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
        $role->description = 'Administrator is having authority to access entire system, create users, make request etc.';
        $role->save();

        $role = new Role();
        $role->name = 'requester';
        $role->display_name = 'Requester';
        $role->description = 'Requester is having authority to create a request.';
        $role->save();

        $role = new Role();
        $role->name = 'verifier';
        $role->display_name = 'Verifier';
        $role->description = 'Verifier is having authority to verify a request. He/She can accept a request or reject a request with comment.';
        $role->save();

        $role = new Role();
        $role->name = 'approver';
        $role->display_name = 'Approver';
        $role->description = 'Approver is having authority to approve a request. He/She can accept a request or reject a request with comment.';
        $role->save();


        $role = new Role();
        $role->name = 'accountant';
        $role->display_name = 'Accountant';
        $role->description = 'Accountant is having authority to create a request, reconcile a bill etc.';
        $role->save();
    }
}
