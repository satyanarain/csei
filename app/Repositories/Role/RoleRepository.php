<?php 
namespace App\Repositories\Role;

use App\Models\Role;
use Illuminate\Support\Facades\Session;
use App\Repositories\Role\RoleRepositoryContract;

class RoleRepository implements RoleRepositoryContract
{
	public function allRoles()
	{
		$roles = Role::all();

		return $roles;
	}

	public function create($request)
	{
		$role = new Role();

		$role->name = strtolower($request->name);
		$role->display_name = ucwords($request->name);
		$role->description = $request->description;

		$role->save();

		return $role;
	}

	public function destroy($id)
	{
        if ($id !== 1) {
            Role::whereId($id)->delete();
        } else {
            Session()->flash('flash_message_warning', 'Can not delete Administrator role');
        }
	}
}