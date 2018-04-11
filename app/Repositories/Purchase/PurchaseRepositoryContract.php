<?php
namespace App\Repositories\Purchase;
interface PurchaseRepositoryContract
{
  //public function getAllBustypes();
    public function create($requestData);
    public function update($id, $requestData);

}
