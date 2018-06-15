<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Voucher;
use App\Models\Vendor;
use App\Models\Bill;
use App\Models\ServiceDocument;
use App\Models\Category;
use App\Models\CSEIRequest;
use Illuminate\Http\Request;
use App\Models\MaterialDetail;
use App\Http\Requests\Requests\UpdateRequestsRequest;
use App\Http\Requests\Requests\StoreRequestsRequest;
use App\Repositories\Request\RequestRepositoryContract;
use DB;
use Mail;
use \App\Traits\activityLog;
class ReportsController extends Controller
{
public $request;
use activityLog;
    public function __construct(RequestRepositoryContract $request)
    {
        $this->request = $request;
    }
    /**
     * Display a listing of the resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//SELECT `id`, `request_no`, `category_id`, `user_id`, `amount`, `required_by_date`, `purpose`, `due_date`, `name_of_project`, `project_expense_head`, `description_of_use`, `verifier_id`, `approver_id`, `rejectore_id`, `director_id`, `comments`, `amount_issued`, `date_issued`, `status`, `created_at`, `updated_at` FROM `requests` WHERE 1
// $id= Auth::id();
     $reports = DB::table('requests')->select('*','requests.due_date','requests.request_no','requests.id as id','requests.status as status','approver.name as approver_name','c_status.name as c_status','categories.name as name','users.name as username','requests.created_at as created_at','requests.updated_at as updated_at')
              ->leftjoin('users','users.id','requests.user_id')
              ->leftjoin('categories','categories.id','requests.category_id')
              ->leftjoin('c_status','c_status.id','requests.status')
              ->leftjoin('users as approver','approver.id','requests.approver_id')
              ->orderBy('requests.id','desc')
              //->where('requests.user_id',$id)
              ->get();
     return view('reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('requests.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  created by satya
     * @return 29-12-2018
     */
     public function store(Request $request) {
        
    }

    public function purchaserReports(Request $request)
        {
      $reports = DB::table('requests')->select('*', 'requests.due_date','requests.request_no', 'requests.id as id','vendors.name as vname','prepared_by.name as prepared_by_name', 'requests.status as status', 'c_status.name as c_status', 'categories.name as name', 'users.name as username', 'requests.created_at as created_at', 'requests.updated_at as updated_at')
                        ->rightjoin('purchase_orders', 'requests.id', 'purchase_orders.request_id')
                        ->leftjoin('users', 'users.id', 'requests.user_id')
                        ->leftjoin('vendors', 'vendors.id', 'purchase_orders.vendor_id')
                        ->leftjoin('categories', 'categories.id', 'requests.category_id')
                         ->leftjoin('users as prepared_by','prepared_by.id','purchase_orders.purchaser_id')
                        ->leftjoin('c_status', 'c_status.id', 'requests.status')
                        ->orderBy('requests.id', 'desc')->get();
        return view('reports.puchaser_reports', compact('reports'));
    }
    
     public function verifyRequestUpdateStatus($id,Request $request)
        {
         $user_id= Auth::user();
         $verifire_name= $user_id->name;
         $verifire_id= $user_id->id;
         $user_id=$request->user_id;
         $request_data= CSEIRequest::whereId($id)->first();
         $amount= $request_data->amount;
         $due_date  =$request_data->due_date;
         $request_no=$request_data->request_no;
         $sql_appover= User::whereId($user_id)->first();
         $approvers = User::whereIn('id', explode(',', $sql_appover->approvers))->get();
         $status = 2; //we assume status is true (1) at the begining;
           CSEIRequest::where('id', $id)->update(['status' =>$status,'verifire_id'=>$verifire_id]); 
		foreach ($approvers as $a_value) 
		{
                   $name= $a_value->name;
                   Mail::send( 'emails.cash.approvers',['verifire_name'=>$verifire_name,'name'=>$name,'amount'=>$amount,'due_date'=>$due_date], function ($m) use ($a_value) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($a_value->email, $a_value->name)->subject('CSEI | Request!'); });
		}
       return redirect()->route('requests.index');
       
      }
      public function requestReject($id, Request $request) {}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
       $user_id= Auth::id();
       $requests = DB::table('requests')->select('*','requests.id as id','c_status.name as c_status','categories.name as name','requests.created_at as created_at','service_documents.document  as service_document','bills.document  as bills_document')
              ->leftjoin('users','users.id','requests.user_id')
              ->leftjoin('categories','categories.id','requests.category_id')
              ->leftjoin('c_status','c_status.id','requests.status')
              ->leftjoin('vouchers','vouchers.request_id','requests.id')
              ->leftjoin('bills','bills.request_id','requests.id')
              ->leftjoin('service_documents','service_documents.request_id','requests.id')
               ->orderBy('requests.id','desc')
               ->where('requests.id',$id)
              ->first();
       
        $quotation_details = DB::table('quotation_details')->where('request_id',$id)->get();
        foreach($quotation_details as $quotation_value)
        {
          $material_id[]= $quotation_value->material_id;
        }
               $material_details = DB::table('material_details')->where('request_id',$id)
              ->whereNotIn('id',$material_id)  
                ->get();
       
         $material_detail_logs = DB::table('material_details','material_details.id as id')
                ->leftjoin('quotation_details','material_details.id','quotation_details.material_id')
                ->where('material_details.request_id',$id)
                ->whereIn('material_details.id',$material_id)  
                ->get();
        
        $material_details_view = DB::table('material_details')->where('request_id',$id)->get();     
               
                
         $vendors = Vendor::all();
         $request_details = DB::table('request_details')->select('*')->where('request_details.request_id',$id)->get();
         $total_voucher = DB::table('requests')->select('*')->where([['category_id',$requests->category_id],['status',5]])->count();
         
         
           $vendor_quotation_lists = DB::table('vendor_quotation_lists')->select('*')
                ->leftjoin('requests', 'requests.id', 'vendor_quotation_lists.request_id')
                ->leftjoin('vendors', 'vendors.id', 'vendor_quotation_lists.vendor_id')
                ->where('vendor_quotation_lists.request_id', $id)
                ->groupBy('vendor_quotation_lists.vendor_id')
                ->get();
      
       
        return view('requests.show', compact('requests','request_details','total_voucher','material_details','vendors','material_details_view','material_detail_logs','vendor_quotation_lists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::pluck('name', 'id');
        $request = CSEIRequest::whereId($id)->firstOrFail();
        $material_details = DB::table('material_details')->where('request_id',$id)->get();
        return view('requests.edit', compact('categories', 'request','material_details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *@author Satya 
     *@24 March 2018 
     */
      public function update($id,Request $request)
    {
       
       $this->request->update($id, $request);
        return redirect()->route('requests.index');
    
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


  /**************************request to approve*******************************************************************************/
 public function requestsToApprove()
 {
 $login_user_id=Auth::id();
 $query = DB::table('users')->whereRaw('FIND_IN_SET(?,approvers)', [$login_user_id])->get();
 foreach($query as $query)
 {
  $requester_appoved_by_login_user[]=$query->id;   
 }
  //print_r($requester_appoved_by_login_user);
 $requests = DB::table('requests')->select('*','requests.id as id','c_status.name as c_status','categories.name as name','requests.created_at as created_at','requests.updated_at as updated_at')
               ->leftjoin('users','users.id','requests.user_id')
               ->leftjoin('categories','categories.id','requests.category_id')
               ->leftjoin('c_status','c_status.id','requests.status')
               ->whereIn('requests.user_id',$requester_appoved_by_login_user)
               ->orderBy('requests.id','desc')
               ->where('requests.status',1) 
               ->get();
          return view('requests.approve', compact('requests'));
 }
  /**************************request to financeApproval*******************************************************************************/
 public function financeApproval()
 {
     
 $requests = DB::table('requests')->select('*','requests.id as id','requests.status as status','c_status.name as c_status','categories.name as name','users.name as requester_name','requests.created_at as created_at','requests.updated_at as updated_at')
              ->leftjoin('users','users.id','requests.user_id')
              ->leftjoin('categories','categories.id','requests.category_id')
              ->leftjoin('c_status','c_status.id','requests.status')
             ->orderBy('requests.id','desc')
              ->where('requests.status',2)
         ->get();
  return view('requests.finance', compact('requests'));
 }
   /**************************@author satya 28-05-2018*******************************************************************************/
  /**************************Request to main admin approval*******************************************************************************/
 public function mainadminApproval()
 {

 $login_user_id=Auth::id();
 $query = DB::table('users') ->whereRaw('FIND_IN_SET(?,approvers)', [$login_user_id])->get();
 foreach($query as $query)
 {
  $requester_appoved_by_login_user[]=$query->id;   
 }
 $requests = DB::table('requests')->select('*','requests.id as id','c_status.name as c_status','categories.name as name','requests.created_at as created_at','requests.updated_at as updated_at')
              ->leftjoin('users','users.id','requests.user_id')
              ->leftjoin('categories','categories.id','requests.category_id')
              ->leftjoin('c_status','c_status.id','requests.status')
               ->orderBy('requests.id','desc')
              ->where('requests.status',3) 
              ->get();
          return view('requests.mainadmin_approval', compact('requests'));
 }
   /**************************@author satya 29-05-2018*******************************************************************************/
  /**************************request to financeApproval*******************************************************************************/
 public function coordinatorSubmission()
 {

 $login_user_id=Auth::id();
 $query = DB::table('users') ->whereRaw('FIND_IN_SET(?,approvers)', [$login_user_id])->get();
 foreach($query as $query)
 {
  $requester_appoved_by_login_user[]=$query->id;   
 }
 $requests = DB::table('requests')->select('*','requests.id as id','c_status.name as c_status','categories.name as name','requests.created_at as created_at','requests.updated_at as updated_at')
              ->leftjoin('users','users.id','requests.user_id')
              ->leftjoin('categories','categories.id','requests.category_id')
              ->leftjoin('c_status','c_status.id','requests.status')
               ->where('requests.category_id',1)
               ->orderBy('requests.id','desc')
              ->where('requests.status',4) 
              ->get();
          return view('requests.coordinator', compact('requests'));
 }

public function callForTender() {
        $requests = DB::table('requests')->select('*', 'requests.id as id', 'requests.status as status', 'c_status.name as c_status', 'categories.name as name', 'users.name as requester_name', 'requests.created_at as created_at', 'requests.updated_at as updated_at')
                ->leftjoin('users', 'users.id', 'requests.user_id')
                ->leftjoin('categories', 'categories.id', 'requests.category_id')
                ->leftjoin('c_status', 'c_status.id', 'requests.status')
                ->orderBy('requests.id', 'desc')
                ->where([['requests.status', 4], ['requests.category_id', 2]])
                ->get();
        return view('requests.call_for_tender_list', compact('requests'));
    }
    
    
    public function receiptOfQuotation() {
       $user_id= Auth::id();
        $vendor_quotation_lists = DB::table('vendor_quotation_lists')->select('*')
        ->leftjoin('vendors','vendors.id','vendor_quotation_lists.vendor_id')
        ->leftjoin('requests','requests.id','vendor_quotation_lists.request_id')
        ->groupBy('requests.id')
        //->whereIn('vendor_quotation_lists.request_id',$send_to_comparision_array)
        ->orderBy('requests.id','desc')
        ->get();
//exit();
    return view('cal_for_tender.receipt_of_quotation', compact('vendor_quotation_lists','user_id'));
    }
    
public function saveVoucher($id, Request $request) {

        $amount_issued = $request->amount_issued;
        $date_issued = $this->insertDate($request->date_issued);

        $status = 5; //we assume status is true (1) at the begining;
        $result = CSEIRequest::where('id', $id)->update(['status' => $status, 'amount_issued' => $amount_issued, 'date_issued' => $date_issued]);
?>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-username">Amount Issued</label>
                    <div class="col-lg-6">
        <?php
        if ($amount_issued != '') {
            echo $amount_issued;
        }
        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-username">Date Issued</label>
                    <div class="col-lg-6">
        <?php
        if ($date_issued != '') {
            echo $this->dateView($date_issued);
        }
        ?>
                    </div>
                </div>
                  
        <?php
    }

}