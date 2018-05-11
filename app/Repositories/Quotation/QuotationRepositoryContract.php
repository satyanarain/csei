<?php 
namespace App\Repositories\Quotation;

interface QuotationRepositoryContract
{
//	public function all();

	public function find($id);

	public function create($request);

	public function update($request, $id);

	//public function destroy($id);

	//public function setPassword($request);
}