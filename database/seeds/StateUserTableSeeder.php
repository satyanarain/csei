<?php

use Illuminate\Database\Seeder;

class StateUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('state_user')->truncate();

        DB::table('state_user')->insert(['user_id'=>2, 'state_id'=>4]);
        DB::table('state_user')->insert(['user_id'=>3, 'state_id'=>4]);
    }
}
