<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();

        $permission = new Permission();

        $permission->name = 'create-state-admin';
        $permission->display_name = 'Create state admin';
        $permission->description = 'Roles with create state admin permission can create state admin.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'create-operator';
        $permission->display_name = 'Create operator';
        $permission->description = 'Roles with create operator permission can create operator. The operator created by stated admin will belong th the state admin belongs to.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'generate-ticket';
        $permission->display_name = 'Generate ticket';
        $permission->description = 'Roles with generate ticket permission can generate ticket. The operator can create the ticket for the state he/she belongs to.';
        $permission->save();
    }
}
