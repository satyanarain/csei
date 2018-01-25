<?php 
namespace App\Repositories\Permission;

use App\Models\Permission;
use Illuminate\Support\Facades\Session;
use App\Repositories\Permission\PermissionRepositoryContract;

class PermissionRepository implements PermissionRepositoryContract
{
	public function all()
	{
		$permissions = Permission::all();

		return $permissions;
	}

	public function create($request)
	{
		$permission = new Permission();

		$permission->name = strtolower($request->name);
		$permission->display_name = ucwords($request->name);
		$permission->description = $request->description;

		$permission->save();

		return $permission;
	}

	public function destroy($id)
	{        
        Permission::whereId($id)->delete();
	}
}