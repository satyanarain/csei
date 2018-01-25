<?php 
namespace App\Repositories\Role;

interface RoleRepositoryContract
{
	public function allRoles();

	public function create($request);

	public function destroy($id);
}