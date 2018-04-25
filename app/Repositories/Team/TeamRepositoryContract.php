<?php 
namespace App\Repositories\Team;

interface TeamRepositoryContract
{
	public function all();

	public function find($id);

	public function create($request);

	public function update($request, $id);

	public function destroy($id);

}