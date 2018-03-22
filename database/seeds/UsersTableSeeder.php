<?php

//use DB;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $user = new User();
        $user->name = 'Administrator';
        $user->verifiers = '3';
        $user->approvers = '4';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('123123');
        $user->contact = '9971361243';
        $user->save();

        $user = new User();
        $user->name = 'Requester';
        $user->verifiers = '3';
        $user->approvers = '4';
        $user->email = 'requester@gmail.com';
        $user->password = bcrypt('123123');
        $user->contact = '9971361243';
        $user->save();

        $user = new User();
        $user->name = 'Verifier';
        $user->verifiers = '3';
        $user->approvers = '4';
        $user->email = 'verifier@gmail.com';
        $user->password = bcrypt('123123');
        $user->contact = '9971361243';
        $user->save();

        $user = new User();
        $user->name = 'Approver';
        $user->verifiers = '3';
        $user->approvers = '4';
        $user->email = 'approver@gmail.com';
        $user->password = bcrypt('123123');
        $user->contact = '9971361243';
        $user->save();

        $user = new User();
        $user->name = 'Accountant';
        $user->verifiers = '3';
        $user->approvers = '4';
        $user->email = 'accountant@gmail.com';
        $user->password = bcrypt('123123');
        $user->contact = '9971361243';
        $user->save();
    }
}
