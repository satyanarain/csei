<?php 
namespace App\Repositories\PurchaseCommittee;

interface PurchaseCommitteeRepositoryContract
{
	public function all();

	public function find($id);

	public function create($request);

	public function update($request, $id);

	public function destroy($id);

}