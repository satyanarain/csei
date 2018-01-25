<?php 
namespace App\Repositories\Permission;

interface PermissionRepositoryContract
{
	public function all();

	public function create($request);

	public function destroy($id);
}