<?php

//use DB;
use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('states')->truncate();

        DB::table('states')->insert([
            'code' => 'UP',
            'name' => 'Uttar Pradesh'
        ]);

        DB::table('states')->insert([
            'code' => 'HR',
            'name' => 'Haryana'
        ]);
        DB::table('states')->insert([
            'code' => 'OR',
            'name' => 'Orissa'
        ]);
        DB::table('states')->insert([
            'code' => 'RJ',
            'name' => 'Rajasthan'
        ]);
        DB::table('states')->insert([
            'code' => 'DL',
            'name' => 'Delhi'
        ]);
        DB::table('states')->insert([
            'code' => 'WB',
            'name' => 'West Bengal'
        ]);
        DB::table('states')->insert([
            'code' => 'MH',
            'name' => 'Maharashtra'
        ]);
        DB::table('states')->insert([
            'code' => 'TN',
            'name' => 'Tamil Nadu'
        ]);
        DB::table('states')->insert([
            'code' => 'HP',
            'name' => 'Himachal Pradesh'
        ]);
        DB::table('states')->insert([
            'code' => 'BR',
            'name' => 'Bihar'
        ]);
        DB::table('states')->insert([
            'code' => 'GJ',
            'name' => 'Gujarat'
        ]);
        DB::table('states')->insert([
            'code' => 'MP',
            'name' => 'Madhya Pradesh'
        ]);
        DB::table('states')->insert([
            'code' => 'PB',
            'name' => 'Punjab'
        ]);
        DB::table('states')->insert([
            'code' => 'UK',
            'name' => 'Uttarakhand'
        ]);
    }
}
