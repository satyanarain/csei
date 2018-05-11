<?php 
namespace App\Repositories\Quotation;

use DB;
use App\Models\Quotation;
//use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Repositories\Quotation\QuotationRepositoryContract;
use Illuminate\Support\Facades\Hash;
class QuotationRepository implements QuotationRepositoryContract
{
//	public function all()
//	{
//		
//	}

	public function find($id)
	{
		$vendors = Quotation::findOrFail($id);

		return $vendors;
	}

public function create($requestData) {
        $input = $requestData->all();
        $vendor_id = $requestData->vendor_id;
        $request_id = $requestData->request_id;
        $material_id = $requestData->material_id;
        $product_code = $requestData->product_code;
        $product_name = $requestData->product_name;
        $purchase_quantity = $requestData->purchase_quantity;
        $purchase_unit_rate = $requestData->purchase_unit_rate;
        $purchase_unit_amount = $requestData->purchase_unit_amount;
        foreach ($product_code as $key => $n) {
            $id = DB::table('vendor_quotation_lists')->insertGetId(
                    ['request_id' => $request_id, 'vendor_id' => $vendor_id, 'material_id' => $material_id[$key], 'product_code' => $product_code[$key], 'product_name' => $product_name[$key], 'purchase_quantity' => $purchase_quantity[$key], 'purchase_unit_rate' => $purchase_unit_rate[$key], 'purchase_unit_amount' => $purchase_unit_amount[$key]]
            );
        }


        Session::flash('flash_message', "Purchase Updated Successfully."); //Snippet in Master.blade.php
        return $id;
    }



	public function destroy($id)
	{
        if ($id !== 1) {
            Role::whereId($id)->delete();
        } else {
            Session()->flash('flash_message_warning', 'Can not delete Administrator role');
        }
	}
	 public function update($request, $id) {
        $teams = PurchaseCommittee::findorFail($id);
        $input = $request->all();
        $input[member_id]=implode(',',$request->member_id);
        $teams->fill($input)->save();
        return $user;
        }


	
}