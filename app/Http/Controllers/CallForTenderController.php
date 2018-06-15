<?php

namespace App\Http\Controllers;

use App\Models\Role;
//use App\Models\Vendor;
use App\Models\Vendor;
use App\Models\CSEIRequest;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Vendor\StoreVendorRequest;
use App\Http\Requests\Vendor\UpdateVendorRequest;
use App\Http\Requests\Vendor\SetPasswordRequest;
use App\Repositories\Vendor\VendorRepositoryContract;
use Session;
use DB;
use Mail;
use \App\Traits\activityLog;
class CallForTenderController extends Controller
{
    public $request;
use activityLog;
   // protected $vendor_quotation_lists;

//    public function __construct(VendorRepositoryContract $vendor_quotation_lists)
//    {
//        $this->vendor_quotation_lists = $vendor_quotation_lists;
//        $this->middleware('eitherAdminOrStateAdmin')->except(['createPassword', 'setPassword']);
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $id= Auth::id();
     $requests = DB::table('requests')->select('*', 'requests.id as id', 'requests.status as status', 'c_status.name as c_status', 'categories.name as name', 'users.name as requester_name', 'requests.created_at as created_at', 'requests.updated_at as updated_at')
                ->leftjoin('users', 'users.id', 'requests.user_id')
                ->leftjoin('categories', 'categories.id', 'requests.category_id')
                ->leftjoin('c_status', 'c_status.id', 'requests.status')
                ->orderBy('requests.id', 'desc')
                ->where([['requests.status', 4], ['requests.category_id', 2]])
                ->orWhere([['requests.status', 4], ['requests.category_id', 3]])
                ->get();
        return view('call_for_tender.index', compact('requests'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
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
       
//      $send_to_comparision = DB::table('quotation_send_for_comparision')->select('*')->get();
//      
//      foreach($send_to_comparision as $send_to_comparision_value)
//      {
//     $send_to_comparision_array[]=  $send_to_comparision_value->request_id;   
//      }
         $vendor_quotation_lists = DB::table('vendor_quotation_lists')->select('*')
        ->leftjoin('vendors','vendors.id','vendor_quotation_lists.vendor_id')
        ->leftjoin('requests','requests.id','vendor_quotation_lists.request_id')
        ->groupBy('requests.id')
        //->whereIn('vendor_quotation_lists.request_id',$send_to_comparision_array)
        ->orderBy('requests.id','desc')
        ->get();

    return view('call_for_tender.receipt_of_quotation', compact('vendor_quotation_lists','user_id'));
        
    }
    
    
    
    public function create()
    {
        $roles = Role::pluck('display_name', 'id');
        $vendor_quotation_lists = Vendor::pluck('name', 'id');
         return view('quotation_reviews.create', compact('roles', 'vendor_quotation_lists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $user_details=Auth::user();
          $logged_user= $user_details->name;
            
          /*****vendor mail**************************************************************/
           if($request->quotation=='quotation')
          {
            $vendor_array = implode(',', $request->vendor); 
           
            $allvendor= Vendor::whereIn('id',$request->vendor)->get();
            /*******************************************************************/ 
            $status=4;
            $id=$request->id;
            $result=CSEIRequest::where('id', $id)->update(['status' =>$status]);
           
            $request_data= CSEIRequest::whereId($id)->first();
            $request_no=$request_data->request_no;
            $amount= $request_data->amount;
            $due_date  =$request_data->due_date;
              $sql_requester= DB::table('requests')->select('*')->leftjoin('users','users.id','requests.user_id')->where('requests.id',$id)->first();
            $s_no = $request->s_no;
            $material_id = $request->material_id;
            $material_string=implode(',',$request->material_id);
            $product_name = $request->product_name;
            $purchase_quantity = $request->purchase_quantity;
            $vendor_response_date = $this->insertDate($request->vendor_response_date);
            $remark = $request->remark;
            $request_id = $id;
            
            if (strlen(implode($s_no)) > 0) {
                foreach ($s_no as $key => $n) {
                     $rfq_no="RFQ-".$request_id."-".$material_id[$key];
                     DB::table('quotation_details')->insertGetId(['material_id' => $material_id[$key],'request_id' => $request_id, 's_no' => $s_no[$key], 'product_name' => $product_name[$key], 'purchase_quantity' => $purchase_quantity[$key], 'remark' => $remark[$key],'vendor_id'=>$vendor_array,'vendor_response_date'=>$vendor_response_date,'rfq_no'=>$rfq_no]
                    );
                }
            } else {
             Session()->flash('flash_message_warning', 'Please add at-least one item to send');
            return redirect()->route('call_for_tender.index');
            }
       /************************************************mail to who will save voucher***********************************************************/
            
               if($result==1)
            {
	        
               foreach($allvendor as $ven)  
               { 
                 
                    Mail::send( 'emails.material.mail_to_vendor', ['request_no'=>$request_no,'vendor_response_date'=>$vendor_response_date,'id'=>$request->id,'name' => $ven->name,'amount' => $amount,'vendor_id'=>$ven->id,'material_string'=>$material_string], function ($m) use ($ven) {
                        $m->from('info@opiant.online', 'CSEI');
                        $m->to($ven->email, $ven->name)->subject('CSEI | Quotation Submit');
                    });
            }
            }
      
              $associates = DB::table('users')->select('*')->where('id',1)->first();
    
             if($result==1)
            {
	            $associate_name = $associates->name;
                    Mail::send( 'emails.material.purchaser_send_qoutation_successfully', ['request_no'=>$request_no,'name' => $associates->name,'amount' => $amount], function ($m) use ($associates) {
                        $m->from('info@opiant.online', 'CSEI');
                        $m->to($associates->email, $associates->name)->subject('CSEI | Request Completed Successfully');
                    });
            
            }
            Session::flash('flash_message', "Call for tender send Successfully.");
          return redirect()->route('call_for_tender.index');
          }
          /**********************************************send_for_comparision*****************************************************/
          /*********************************************send_for_comparision******************************************************/
          /********************************************send_for_comparision*******************************************************/
          else if($request->send_for_comparision=='send_for_comparision')
          {
            $category_id = $request->category_id;
            $vendor_id = $request->vendor_id;
            $approved_vendor_id = $request->approved_vendor_id;
            $request_id = $request->request_id;
            $purchaser_id  = $user_details->id;
            $request_data= CSEIRequest::whereId($request_id)->first();
            $request_no=$request_data->request_no;
            $amount= $request_data->amount;
            $due_date  =$request_data->due_date;
                foreach ($vendor_id as $key => $n) {
                     DB::table('quotation_send_for_comparision')->insertGetId(['vendor_id' => $vendor_id[$key],'request_id' => $request_id,'approved_vendor_id' => $approved_vendor_id[$key],'purchaser_id'=>$purchaser_id,'category_id'=>$category_id]
                    );
                }
            $purchase_committees = DB::table('purchase_committees')->select('*')->first();
            $purchase_committees_array  =  explode(',',$purchase_committees->member_id);
            //print_r($purchase_committees_array);
            
            $users=DB::table('users')->select('*')->whereIn('id',$purchase_committees_array)->get();
              
                foreach($users as $user_value)
            {
                 
                    Mail::send( 'emails.committee_member.mail_to_commitee_member_for_comment', ['request_no'=>$request_no,'name' => $user_value->name,'amount' => $amount,'logged_user'=>$logged_user], function ($m) use ($user_value) {
                        $m->from('info@opiant.online', 'CSEI');
                        $m->to($user_value->email, $user_value->name)->subject('CSEI | Request For Comparision Analysis');
                    });
             }
                
       /************************************************mail to who will save voucher***********************************************************/
              Session::flash('flash_message', "Call for tender send Successfully.");
          return redirect()->route('receipt_of_quotation.call_for_tender');
              
          }
          /**********************************************send_for_comparision*****************************************************/
          /*********************************************send_for_comparision******************************************************/
          /********************************************send_for_comparision*******************************************************/
          else if($request->send_for_admin_approval=='send_for_admin_approval')
          {
          
            $vendor_id = $request->vendor_id;
            $category_id = $request->category_id;
            
            $approved_vendor_id = $request->approved_vendor_id;
            $request_id = $request->request_id;
            $purchaser_id  = $user_details->id;
            $request_data= CSEIRequest::whereId($request_id)->first();
            $request_no=$request_data->request_no;
            $amount= $request_data->amount;
            $due_date  =$request_data->due_date;
                foreach ($vendor_id as $key => $n) {
                     DB::table('quotation_send_for_comparision')->insertGetId(['vendor_id' => $vendor_id[$key],'request_id' => $request_id,'approved_vendor_id' => $approved_vendor_id[$key],'purchaser_id'=>$purchaser_id,'category_id'=>$category_id]
                    );
                }
            
                
              $role_user=DB::table('role_user')->where('role_id',11)->get();
           foreach($role_user as $role_user) 
           {
           $all_coordinator_array[]= $role_user->user_id;  
               
           }
             $role_user=DB::table('users')->whereIn('id',$all_coordinator_array)->get();  

    /******************************************email to all financer  *********************************/ 
               if($result==1)
          {
             foreach($role_user as $role_user_value)
             {
                    Mail::send( 'emails.material.email_to_purchaser_to_create_po',['name'=>$role_user_value->name,'request_no'=>$request_no,'amount'=>$amount,'logged_user'=>$logged_user], function ($m) use ($role_user_value) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($role_user_value->email, $role_user_value->name)->subject('CSEI |  Request Create PO.'); });
             }
          }
          /******************************************email for admin to apprved vender successfully*********************************/
       /************************************************mail to who will save voucher***********************************************************/
              Session::flash('flash_message', "Call for tender send Successfully.");
          return redirect()->route('receipt_of_quotation.call_for_tender');
              
          }
         
    }

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
      
       
        return view('call_for_tender.show', compact('requests','request_details','total_voucher','material_details','vendors','material_details_view','material_detail_logs','vendor_quotation_lists'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $vendor_quotation_lists = $this->vendor_quotation_lists->find($id);
        return view('quotation_reviews.edit', compact('vendor_quotation_lists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVendorRequest $request, $id)
    {
        $this->vendor_quotation_lists->update($request, $id);

        return redirect()->route('quotation_reviews.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
  
     public function statusUpdate($id)
    {
    $sql=DB::table('vendor_quotation_lists')->where('id',$id)->first(); 
     if($sql->status==0)
       {
       $status=  $sql->status;
       $vendor = Vendor::findorFail($id);
       $vendor->status=1;
       $vendor->save();
       echo 1;
      }else
       {
       $status=  $sql->status;
       $vendor = Vendor::findorFail($id);
       $vendor->status=0;
       $vendor->save();
       echo 0;
       }
    }
    public function createPassword($token)
    {
        return view('quotation_reviews.reset')
            ->withToken($token);
    }

    public function setPassword(SetPasswordRequest $request)
    {
        $vendor_quotation_lists = $this->vendor_quotation_lists->setPassword($request);

        if($vendor_quotation_lists)
        {
            Auth::loginUsingId($vendor_quotation_lists->id);

            return redirect()->route('home');
        }        
    }
}
