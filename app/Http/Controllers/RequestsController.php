<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\CSEIRequest;
use Illuminate\Http\Request;
use App\Http\Requests\Requests\UpdateRequestsRequest;
use App\Http\Requests\Requests\StoreRequestsRequest;
use App\Repositories\Request\RequestRepositoryContract;
use DB;
use Mail;
use \App\Traits\activityLog;
class RequestsController extends Controller
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

     $id= Auth::id();
     $requests = DB::table('requests')->select('*','requests.id as id','c_status.name as c_status','categories.name as name','requests.created_at as created_at','requests.updated_at as updated_at')
              ->leftjoin('users','users.id','requests.user_id')
              ->leftjoin('categories','categories.id','requests.category_id')
              ->leftjoin('c_status','c_status.id','requests.status')
              ->orderBy('requests.id','desc')
               ->where('requests.user_id',$id)
              ->get();
     return view('requests.index', compact('requests'));
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
    public function store(Request $request)
    {
           $user_details=Auth::user();
//           echo "<pre>";
//           print_r($_POST);
//           
//       exit();    
//           
     if($request->verify=='Verify')
        {
         /********************************************************/
        /********************************************************/
         
          $id=  $request->id;
          $comments=  $request->comments;
          $name_of_project=  $request->name_of_project;
          $project_expense_head=  $request->project_expense_head;
          $user_id_login= Auth::user();
          $verifire_name= $user_id_login->name;
          $verifire_id= $user_id_login->id;
          $user_id=$request->user_id;
          $request_data= CSEIRequest::whereId($id)->first();
          $amount= $request_data->amount;
          $due_date  =$request_data->due_date;
          $sql_appover= User::whereId($user_id)->first();
         /*********************app approver email*************************/
          $approvers = User::whereIn('id', explode(',', $sql_appover->approvers))->get();
          $requester = DB::table('requests')->select('*','requests.id as id')->leftjoin('users','users.id','requests.user_id')->where('requests.id',$id)->first();
          $status = 2; //we assume status is true (1) at the begining;
          $result=CSEIRequest::where('id', $id)->update(['name_of_project'=>$name_of_project,'project_expense_head'=>$project_expense_head,'status' =>$status,'verifire_id'=>$verifire_id]); 
         
          /************************************mail to approver******************************************/
            if($result==1)
          {
             foreach ($approvers as $a_value) 
		{
                   $name= $a_value->name;
                   Mail::send('emails.ve_r_to_approver',['verifire_name'=>$verifire_name,'name'=>$name,'amount'=>$amount,'due_date'=>$due_date,'verifier_name'=>$user_details->name], function ($m) use ($a_value) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($a_value->email, $a_value->name)->subject('CSEI | Request for Approval'); });
		}
          }
           /************************************mail to verifier******************************************/
          
           if($result==1)
          {
               Mail::send('emails.user_who_will_verify',['name'=>$user_details->name,'amount'=>$amount], function ($m) use ($user_details) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($user_details->email, $user_details->name)->subject('CSEI | Request Verifed'); });
             }
           /************************************mail to requester******************************************/
          if($result==1)
          {
          $verified_approved='verify';
                   Mail::send('emails.mail_to_requester_for_va',['verifire_name'=>$verifire_name,'name'=>$requester->name,'amount'=>$requester->amount,'due_date'=>$requester->due_date,'verified_approved'=>$verified_approved], function ($m) use ($requester) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($requester->email, $requester->name)->subject('CSEI | Request Verified'); });
             }
		 
             return redirect()->route('verifiers.requests'); 
                  
         }
     else if($request->approve=='Approve')
        {
        
         $id=  $request->id;
         $comments=  $request->comments;
         $user_id_login= Auth::user();
         $apporver_name= $user_id_login->name;
         $approver_id= $user_id_login->id;
         $user_id=$request->user_id;
         $request_data= CSEIRequest::whereId($id)->first();
         $amount= $request_data->amount;
         $due_date  =$request_data->due_date;
         $sql_appover= User::whereId($user_id)->first();
         /*********************app associates*************************/
          $associates = DB::table('role_user')
                 ->leftjoin('users','users.id','role_user.user_id')
                ->where('role_user.role_id',5) 
                 ->get();
          /****************************************************************************************/
          $requester = DB::table('requests')->select('*','requests.id as id')->leftjoin('users','users.id','requests.user_id')->where('requests.id',$id)->first();
          $status = 3; 
           //update status
        $result=  CSEIRequest::where('id', $id)->update(['status' =>$status,'approver_id'=>$approver_id]); 
        /******************************************email for associates*********************************/
          if($result==1)
            {
		foreach ($associates as $a_value) {
                    $name = $a_value->name;
                    Mail::send('emails.associates', ['apporver_name' => $apporver_name, 'name' => $name,'associate_name'=>$a_value->name, 'amount' => $amount, 'due_date' => $due_date], function ($m) use ($a_value) {
                        $m->from('info@opiant.online', 'CSEI');
                        $m->to($a_value->email, $a_value->name)->subject('CSEI | Request for take action');
                    });
                }
            }
            
            /******************************************email for verifier who will verify email*********************************/ 
            
               if($result==1)
          {
               Mail::send('emails.user_who_will_approve',['name'=>$user_details->name,'amount'=>$amount], function ($m) use ($user_details) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($user_details->email, $user_details->name)->subject('CSEI |  Request Verifed'); });
             }
            /******************************************email for requester*********************************/   
            if($result==1)
          {
                   $verified_approved='approve';
                   Mail::send('emails.mail_to_requester_for_va',['apporver_name'=>$apporver_name,'name'=>$requester->name,'amount'=>$requester->amount,'due_date'=>$requester->due_date,'verified_approved'=>$verified_approved], function ($m) use ($requester) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($requester->email, $requester->name)->subject('CSEI | Request Approved'); });
          }
             return redirect()->route('approvers.requests'); 
         }
          else if($request->rejected=='Rejected'){
             /****************Reject section start here*******************************************************************************/
         $id=  $request->id;
         $comments=  $request->comments;
         $user_id_login= Auth::user();
         $rejector_name= $user_id_login->name;
         $rejectore_id= $user_id_login->id;
        
         $requester_user_id=$request->user_id;
         $request_data= CSEIRequest::whereId($id)->first();
        $amount= $request_data->amount;
        $due_date  =$request_data->due_date;
        
        /************************************requester details**************************************************************/
          $sql_requester_name= User::whereId($requester_user_id)->first();
          $status = 7; //we assume status is true (1) at the begining;
          $result= CSEIRequest::where('id', $id)->update(['status' =>$status,'rejectore_id'=>$rejectore_id,'comments'=>$comments]); 
          /*******************************mail to requester when request reject at verification time***********************************************************************/
            $name= $sql_requester_name->name;
                      if($result==1)
          {
                   Mail::send('emails.request_reject_verification_time',['rejector_name'=>$rejector_name,'name'=>$name,'amount'=>$amount,'due_date'=>$due_date,'comments'=>$comments], function ($m) use ($sql_requester_name) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($sql_requester_name->email, $sql_requester_name->name)->subject('CSEI | Request Rejection Mail'); });
          }
	/*******************************mail to requester verifier***********************************************************************/
         
           if($result==1)
          {
               Mail::send('emails.reject_mail_to_verifier',['name'=>$user_details->name,'amount'=>$amount], function ($m) use ($user_details) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($user_details->email, $user_details->name)->subject('CSEI | Request Rejection Mail'); });
             }
          
                  return redirect()->route('verifiers.requests'); 
           }
          else if($request->approverejected=='Rejected'){
             /****************Veri Fy Reject section start here*******************************************************************************/
         $id=  $request->id;
         $comments=  $request->comments;
         $user_id_login= Auth::user();
         $rejector_name= $user_id_login->name;
         $rejectore_id= $user_id_login->id;
          $requester_user_id=$request->user_id;
         $request_data= CSEIRequest::whereId($id)->first();
        $amount= $request_data->amount;
        $due_date  =$request_data->due_date;
         $sql_requester_name= User::whereId($requester_user_id)->first();
         $status = 6; //we assume status is true (1) at the begining;
         $result = CSEIRequest::where('id', $id)->update(['status' =>$status,'rejectore_id'=>$rejectore_id,'comments'=>$comments]); 
         
           /*******************************mail to requester when request reject at verification time***********************************************************************/
            $name= $sql_requester_name->name;
                      if($result==1)
          {
                   Mail::send('emails.request_reject_approver_time',['rejector_name'=>$rejector_name,'name'=>$name,'amount'=>$amount,'due_date'=>$due_date,'comments'=>$comments], function ($m) use ($sql_requester_name) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($sql_requester_name->email, $sql_requester_name->name)->subject('CSEI | Request Rejection Mail'); });
          }
          /*******************************mail to approver***********************************************************************/
        
	 $name= $sql_requester_name->name;
                                if($result==1)
          {
                   Mail::send('emails.reject_mail_to_approver',['rejector_name'=>$rejector_name,'name'=>$name,'amount'=>$amount,'due_date'=>$due_date,'comments'=>$comments], function ($m) use ($sql_requester_name) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($sql_requester_name->email, $sql_requester_name->name)->subject('CSEI | Request Rejection Mail'); });
	  }
        
          /*******************************mail to verifier***********************************************************************/
        
//	 $name= $sql_requester_name->name;
//                                if($result==1)
//          {
//                   Mail::send('emails.reject_mail_to_approver',['rejector_name'=>$rejector_name,'name'=>$name,'amount'=>$amount,'due_date'=>$due_date,'comments'=>$comments], function ($m) use ($request_data) {
//                   $m->from('info@opiant.online', 'CSEI');
//                   $m->to($request_data->email, $request_data->name)->subject('CSEI | Request Rejection Mail'); });
//	  }
        
        
        
                  return redirect()->route('approvers.requests'); 
        }
           else{
          
         $this->request->create($request);
         return redirect()->route('requests.index');
        }
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
         $sql_appover= User::whereId($user_id)->first();
         $approvers = User::whereIn('id', explode(',', $sql_appover->approvers))->get();
         $status = 2; //we assume status is true (1) at the begining;
           CSEIRequest::where('id', $id)->update(['status' =>$status,'verifire_id'=>$verifire_id]); 
		foreach ($approvers as $a_value) 
		{
                   $name= $a_value->name;
                   Mail::send('emails.approvers',['verifire_name'=>$verifire_name,'name'=>$name,'amount'=>$amount,'due_date'=>$due_date], function ($m) use ($a_value) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($a_value->email, $a_value->name)->subject('CSEI | Request!'); });
		}
       return redirect()->route('requests.index');
       
      }
     public function requestReject($id,Request $request)
        {
         $user_id= Auth::user();
         $verifire_name= $user_id->name;
         $verifire_id= $user_id->id;
        
         $user_id=$request->user_id;
         $request_data= CSEIRequest::whereId($id)->first();
        $amount= $request_data->amount;
        $due_date  =$request_data->due_date;
        
         $sql_appover= User::whereId($user_id)->first();
         $approvers = User::whereIn('id', explode(',', $sql_appover->approvers))->get();
         $status = 2; //we assume status is true (1) at the begining;
        CSEIRequest::where('id', $id)->update(['status' =>$status,'verifire_id'=>$verifire_id]); 
		foreach ($approvers as $a_value) 
		{
                   $name= $a_value->name;
                   Mail::send('emails.approvers',['verifire_name'=>$verifire_name,'name'=>$name,'amount'=>$amount,'due_date'=>$due_date], function ($m) use ($a_value) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($a_value->email, $a_value->name)->subject('Request!'); });
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
       $requests = DB::table('requests')->select('*','c_status.name as c_status','categories.name as cat_name','users.name as requester_name','requests.created_at as created_at','requests.updated_at as updated_at','requests.id as id')
              ->leftjoin('users','users.id','requests.user_id')
              ->leftjoin('categories','categories.id','requests.category_id')
              ->leftjoin('c_status','c_status.id','requests.status')
              ->where('requests.id',$id)
              ->first();
       
              $request_details = DB::table('request_details')->select('*')
              ->where('request_details.request_id',$id)
              ->get();
       
       
      return view('requests.show', compact('requests','request_details'));
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
        return view('requests.edit', compact('categories', 'request'));
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


    public function requestsToVerify()
    {
$login_user_id=Auth::id();
 $query = DB::table('users') ->whereRaw('FIND_IN_SET(?,verifiers)', [$login_user_id])->get();
 foreach($query as $query)
 {
  $requester_appoved_by_login_user[]=$query->id;   
 }
 $requests = DB::table('requests')->select('*','requests.id as id','c_status.name as c_status','categories.name as name','requests.created_at as created_at','requests.updated_at as updated_at')
              ->leftjoin('users','users.id','requests.user_id')
              ->leftjoin('categories','categories.id','requests.category_id')
              ->leftjoin('c_status','c_status.id','requests.status')
              ->where('requests.status',1) 
              ->orderBy('requests.id','desc')
             ->whereIn('requests.user_id',$requester_appoved_by_login_user)
            ->get();
        
        return view('requests.verify', compact('requests'));
    }
  /**************************request to approve*******************************************************************************/
 public function requestsToApprove()
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
              ->where('requests.status',2) 
              ->get();
          return view('requests.approve', compact('requests'));
 }

     public function requestsToReconcile()
    {
        $requests = CSEIRequest::where('status', '2')->get();
        return view('requests.accountant', compact('requests'));
    }
    
    public function requestsApproved()
    {
    $requests = DB::table('requests')->select('*','requests.id as id','c_status.name as c_status','categories.name as name','users.name as requester_name','requests.created_at as created_at','requests.updated_at as updated_at')
              ->leftjoin('users','users.id','requests.user_id')
              ->leftjoin('categories','categories.id','requests.category_id')
              ->leftjoin('c_status','c_status.id','requests.status')
              ->where('requests.status',3) 
              ->get();
 
   return view('requests.accountant', compact('requests'));
    }

    public function verifyRequest(Request $request, $id)
    {
        $request = CSEIRequest::whereId($id)->firstOrFail();

    }

    public function approveRequest(Request $request, $id)
    {

    }
   

    public function rejectRequestVerifier(Request $request, $id)
    {

    }

    public function rejectRequestApprover(Request $request, $id)
    {
        
    }
    
    
     public function saveVoucher($id ,Request $request)
    {

   $amount_issued=$request->amount_issued;
   $date_issued=$this->insertDate($request->date_issued);
      
       $status = 5; //we assume status is true (1) at the begining;
          $result= CSEIRequest::where('id', $id)->update(['status' =>$status,'amount_issued'=>$amount_issued,'date_issued'=>$date_issued]);  
          
          ?>
           <div class="form-group row">
                                   <label class="col-lg-4 col-form-label" for="val-username">Amount Issued</label>
                                            <div class="col-lg-6">
                                                <?php
                                                if($amount_issued!='')
                                                {
                                                   echo  $amount_issued; 
                                                }
                                                ?>
                                               
                                              </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Date Issued</label>
                                            <div class="col-lg-6">
                                                <?php
                                                if($date_issued!='')
                                                {
                                                 echo  $this->dateView($date_issued); 
                                                }
                                                ?>
                                              </div>
                                        </div>
          
       <?php   
         
    }
    
    
}
