<?php

//use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS=0');
    	$this->call(UsersTableSeeder::class);
    	$this->call(RolesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(StateUserTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
