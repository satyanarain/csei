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
class RequestsController extends Controller
{
    public $request;

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
     if($request->verify=='Verify')
        {
          $id=  $request->id;
          $comments=  $request->comments;
         $user_id_login= Auth::user();
         $verifire_name= $user_id_login->name;
         $verifire_id= $user_id_login->id;
        
         $user_id=$request->user_id;
         $request_data= CSEIRequest::whereId($id)->first();
        $amount= $request_data->amount;
        $due_date  =$request_data->due_date;
        
         $sql_appover= User::whereId($user_id)->first();
         /*********************app approver email*************************/
         //$approvers = User::whereIn('id', explode(',', $sql_appover->approvers))->get();
          $requester = DB::table('requests')->select('*','requests.id as id')->leftjoin('users','users.id','requests.user_id')->where('requests.id',$id)->first();
          
      // print_r($requester);
          
       //  exit();
           $status = 2; //we assume status is true (1) at the begining;
           CSEIRequest::where('id', $id)->update(['status' =>$status,'verifire_id'=>$verifire_id]); 
	/*	foreach ($approvers as $a_value) 
		{
                   $name= $a_value->name;
                   Mail::send('emails.approvers',['verifire_name'=>$verifire_name,'name'=>$name,'amount'=>$amount,'due_date'=>$due_date], function ($m) use ($a_value) {
                   $m->from('info@opiant.online', 'Approval Mail');
                   $m->to($a_value->email, $a_value->name)->subject('Request!'); });
		}
                
                */$verify_aprove='verify';
                   Mail::send('emails.requester',['verifire_name'=>$verifire_name,'name'=>$requester->name,'amount'=>$requester->amount,'due_date'=>$requester->due_date,'verify_aprove'=>$verify_aprove], function ($m) use ($requester) {
                   $m->from('info@opiant.online', 'Vrerification Mail');
                   $m->to($requester->email, $requester->name)->subject('Your Request has been verified!'); });
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
//         $associates = DB::table('role_user')
//                 ->leftjoin('users','users.id','role_user.user_id')
//                ->where('role_user.role_id',5) 
//                 ->get();
//        echo "<pre>";
//        print_r($associates);
//        
//        exit();
           /****************************************************************************************/
          $requester = DB::table('requests')->select('*','requests.id as id')->leftjoin('users','users.id','requests.user_id')->where('requests.id',$id)->first();
            $status = 3; 
           //update status
          CSEIRequest::where('id', $id)->update(['status' =>$status,'approver_id'=>$approver_id]); 
//		foreach ($associates as $a_value) 
//		{
//                   $name= $a_value->name;
//                   Mail::send('emails.associates',['apporver_name'=>$apporver_name,'name'=>$name,'amount'=>$amount,'due_date'=>$due_date], function ($m) use ($a_value) {
//                   $m->from('info@opiant.online', 'Approval Mail');
//                   $m->to($a_value->email, $a_value->name)->subject('Request!'); });
//		}
          
          $verify_aprove='aprove';
                   Mail::send('emails.requester',['apporver_name'=>$apporver_name,'name'=>$requester->name,'amount'=>$requester->amount,'due_date'=>$requester->due_date,'verify_aprove'=>$verify_aprove], function ($m) use ($requester) {
                   $m->from('info@opiant.online', 'Approval Mail');
                   $m->to($requester->email, $requester->name)->subject('Request!'); });
             return redirect()->route('approvers.requests'); 
         }
          else if($request->rejected=='Rejected'){
             /****************Reject section start here*******************************************************************************/
          $id=  $request->id;
         $comments=  $request->comments;
         $user_id_login= Auth::user();
         echo $rejector_name= $user_id_login->name;
         $rejectore_id= $user_id_login->id;
        
         $requester_user_id=$request->user_id;
         $request_data= CSEIRequest::whereId($id)->first();
        $amount= $request_data->amount;
        $due_date  =$request_data->due_date;
        
         $sql_requester_name= User::whereId($requester_user_id)->first();
         //$approvers = User::whereIn('id', explode(',', $sql_appover->approvers))->get();
     // $sql_requester_name->name;
     // $sql_requester_name->email;
         
      //exit();
           $status = 7; //we assume status is true (1) at the begining;
           CSEIRequest::where('id', $id)->update(['status' =>$status,'rejectore_id'=>$rejectore_id,'comments'=>$comments]); 
		//foreach ($approvers as $a_value) 
		//{
                   $name= $sql_requester_name->name;
                   Mail::send('emails.reject',['rejector_name'=>$rejector_name,'name'=>$name,'amount'=>$amount,'due_date'=>$due_date,'comments'=>$comments], function ($m) use ($sql_requester_name) {
                   $m->from('info@opiant.online', 'Request Rejection Mail');
                   $m->to($sql_requester_name->email, $sql_requester_name->name)->subject('Request Rejection Mail!'); });
		//}
                  return redirect()->route('verifiers.requests'); 
         
         
         
         }
          else if($request->approverejected=='Rejected'){
             /****************Veri Fy Reject section start here*******************************************************************************/
              //echo "========================";
              //exit();
              
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
         //$approvers = User::whereIn('id', explode(',', $sql_appover->approvers))->get();
     // $sql_requester_name->name;
     // $sql_requester_name->email;
      
           $status = 7; //we assume status is true (1) at the begining;
           CSEIRequest::where('id', $id)->update(['status' =>$status,'rejectore_id'=>$rejectore_id,'comments'=>$comments]); 
		//foreach ($approvers as $a_value) 
		//{
                   $name= $sql_requester_name->name;
                   Mail::send('emails.reject',['rejector_name'=>$rejector_name,'name'=>$name,'amount'=>$amount,'due_date'=>$due_date,'comments'=>$comments], function ($m) use ($sql_requester_name) {
                   $m->from('info@opiant.online', 'Request Rejection Mail');
                   $m->to($sql_requester_name->email, $sql_requester_name->name)->subject('Request Rejection Mail!'); });
		//}
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
                   $m->from('info@opiant.online', 'Approval Mail');
                   $m->to($a_value->email, $a_value->name)->subject('Request!'); });
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
                   $m->from('info@opiant.online', 'Approval Mail');
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
       $requests = DB::table('requests')->select('*','c_status.name as c_status','categories.name as cat_name','requests.created_at as created_at','requests.updated_at as updated_at','requests.id as id')
              ->leftjoin('users','users.id','requests.user_id')
              ->leftjoin('categories','categories.id','requests.category_id')
              ->leftjoin('c_status','c_status.id','requests.status')
              //->where('requests.user_id',$user_id)
              ->where('requests.id',$id)
              ->first();
      return view('requests.show', compact('requests'));
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
             ->whereIn('requests.user_id',$requester_appoved_by_login_user)
            ->get();
        
        return view('requests.verify', compact('requests'));
    }

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
}
