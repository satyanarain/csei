<?php

namespace App\Repositories\Purchase;

use App\Models\Purchase;
use App\Models\PurchaseDetail;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Gate;
use Datatables;
use Carbon;
use Notifynder;
use PHPZen\LaravelRbac\Traits\Rbac;
use App\Models\Role;
use App\Models\PurchaseLog;
use Auth;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\PurchaseCreated;
use App\Traits\activityLog;
class PurchaseRepository implements PurchaseRepositoryContract {
 use activityLog;
    public function find($id) {
        return Purchase::join('routes', 'users.user_type', '=', 'roles.id')->first(1);
    }

    public function getAllPurchases() {
        return Purchase::all();
    }
    
public function create($requestData) {
    echo "<pre>";
 print_r($_POST);
 /*Array
(
    [_token] => HKXz2eMflj91ctGkov4IYvTOyJ52OxTt7C0nAS2r
    [po_number] => 1
    [po_date] => 
    [v_name] => Vendor Name
    [v_address] => Vendor Address
    [v_phone] => Vendor Phone
    [v_mobile] => Vendor Mobile
    [s_name] => Ship Name
    [s_address] => Ship Address
    [s_phone] => Ship Phone
    [s_mobile] => Ship Mobile
    [product_code] => Array
        (
            [0] => #1
            [1] => #2
            [2] => #3
        )

    [product_name] => Array
        (
            [0] => product1
            [1] => product2
            [2] => product3
        )

    [purchase_quantity] => Array
        (
            [0] => 1
            [1] => 2
            [2] => 1
        )

    [purchase_unit_rate] => Array
        (
            [0] => 1000
            [1] => 10000
            [2] => 5000
        )

    [purchase_unit_amount] => Array
        (
            [0] => 1000.00  
            [1] => 20000.00
            [2] => 5000.00
        )

    [action] => 
)SELECT `id`, `user_id`, `perchase_id`, `product_code`, `product_name`, `unit_rate`, `total_amount`, `total`, `s_name`, `s_address`, `s_mobile`, 
  * `s_phone`, `requisitioner`, `created_at`, `updated_at` FROM `purchase_details` WHERE 1
  * */
  
    
  //exit();  
$input=$requestData->all();
$userid = Auth::id();
$userid = Auth::id();
$input['user_id'] = $userid;
$input['po_date'] = $this->insertDate($requestData->po_date);

$purchase_id = Purchase::create($input)->id;

$product_code = $requestData->product_code;
$product_name = $requestData->product_name;
$purchase_quantity = $requestData->purchase_quantity;
$purchase_unit_rate = $requestData->purchase_unit_rate;
$purchase_unit_amount = $requestData->purchase_unit_amount;

foreach($product_code as $key => $n ) 
{
$id = DB::table('purchase_details')->insertGetId(
    ['purchase_id' =>$purchase_id,'product_code' => $product_code[$key],'product_name'=>$product_name[$key],'purchase_quantity'=>$purchase_quantity[$key],'purchase_unit_rate'=>$purchase_unit_rate[$key],'purchase_unit_amount'=>$purchase_unit_amount[$key]]
);

}	
 Session::flash('flash_message', "Purchase Updated Successfully."); //Snippet in Master.blade.php
 return $id;
 
    }
 public function update($id, $requestData) {
$stage=  $requestData->stage;
$userid = Auth::id();
$adult_ticket_amount = $requestData->adult_ticket_amount;
$child_ticket_amount = $requestData->child_ticket_amount;
$luggage_ticket_amount = $requestData->luggage_ticket_amount;
$service_id = $requestData->service_id;

$delete=DB::table('purchase_details')->where('service_id',$service_id)->get();

if(count($delete)>0)
{
foreach($delete as $delete_id) 
{
  $id= $delete_id->id;
  PurchaseDetail::destroy($id);
}
}

foreach($stage as $key => $n ) 
{
$id = DB::table('purchase_details')->insertGetId(
    ['service_id' =>$service_id,'stage' => $stage[$key],'adult_ticket_amount'=>$adult_ticket_amount[$key],'child_ticket_amount'=>$child_ticket_amount[$key],'luggage_ticket_amount'=>$luggage_ticket_amount[$key]]
);

}	
 Session::flash('flash_message', "Purchase Created Successfully."); //Snippet in Master.blade.php
 return $id;
 
}
}