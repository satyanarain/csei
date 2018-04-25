<?php 
namespace App\Repositories\Vendor;

interface VendorRepositoryContract
{
	public function all();

	public function find($id);

	public function create($request);

	public function update($request, $id);

	public function destroy($id);

	//public function setPassword($request);
}