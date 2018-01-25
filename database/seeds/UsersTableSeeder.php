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
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('admin@123');
        $user->contact = '9971361243';
        $user->save();

        $user = new User();
        $user->name = 'State Administrator';
        $user->email = 'stateadmin@stateadmin.com';
        $user->password = bcrypt('stateadmin@123');
        $user->contact = '9971361243';
        $user->save();

        $user = new User();
        $user->name = 'Operator';
        $user->email = 'operator@operator.com';
        $user->password = bcrypt('operator@123');
        $user->contact = '9971361243';
        $user->save();
    }
}
