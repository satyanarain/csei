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

        $permission->name = 'create-user';
        $permission->display_name = 'Create User';
        $permission->description = 'Roles with create user permission can create users.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'create-request';
        $permission->display_name = 'Create request';
        $permission->description = 'Roles with create request permission can create requests.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'generate-po';
        $permission->display_name = 'Generate Purchage Order';
        $permission->description = 'Roles with generate po permission can generate purchage orders.';
        $permission->save();

        $permission = new Permission();

        $permission->name = 'reconcile-bills';
        $permission->display_name = 'Reconcile Bills';
        $permission->description = 'Roles with reconcile bills permission can reconcile bills and close the request.';
        $permission->save();
    }
}
