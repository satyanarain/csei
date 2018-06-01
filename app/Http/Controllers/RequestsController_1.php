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
     $requests = DB::table('requests')->select('*','requests.id as id','requests.status as status','c_status.name as c_status','categories.name as name','requests.created_at as created_at','requests.updated_at as updated_at')
              ->leftjoin('users','users.id','requests.user_id')
              ->leftjoin('categories','categories.id','requests.category_id')
              ->leftjoin('c_status','c_status.id','requests.status')
               ->leftjoin('bills','bills.request_id','requests.id')
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
     $logged_user= $user_details->name;
//   echo "<pre>";
//   print_r($_POST);
//   echo "</pre>";
//   exit();
      if($request->category_id==1)
     {
  
     if($request->approve=='Approve')
        {
        
         $id=  $request->id;
         $comments=  $request->comments;
       
         $approver_id= $user_details->id;
         $user_id=$request->user_id;
         $name_of_project=  $request->name_of_project;
         $project_expense_head=  $request->project_expense_head;
         $request_data= CSEIRequest::whereId($id)->first();
         $request_no=$request_data->request_no;
         $amount= $request_data->amount;
         $sql_appover= User::whereId($user_id)->first();
         $associates = DB::table('users')->select('*')->where('id',1)->first();
          /****************************************************************************************/
          $requester = DB::table('requests')->select('*','requests.id as id')->leftjoin('users','users.id','requests.user_id')->where('requests.id',$id)->first();
          $status = 2; 
          
            $result=CSEIRequest::where('id', $id)->update(['name_of_project'=>$name_of_project,'project_expense_head'=>$project_expense_head,'status' =>$status,'verifire_id'=>$verifire_id]); 
         
          // $result=  CSEIRequest::where('id', $id)->update(['status' =>$status,'approver_id'=>$approver_id]); 
        /******************************************email finance department*********************************/
          $role_user=DB::table('role_user')->where('role_id',7)->get();
           foreach($role_user as $role_user) 
           {
           $all_finance_user_array[]= $role_user->user_id;  
               
           }
             $role_user=DB::table('users')->whereIn('id',$all_finance_user_array)->get();  
         /******************************************email to all financer  *********************************/ 
               if($result==1)
          {
             foreach($role_user as $role_user_value)
             {
                    Mail::send( 'emails.cash.finance',['name'=>$role_user_value->name,'logged_user'=>$logged_user,'request_no'=>$request_no,'amount'=>$amount], function ($m) use ($role_user_value) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($role_user_value->email, $role_user_value->name)->subject('CSEI |  Request Approved'); });
             }
          }
     /******************************************email for requester*********************************/   
    /******************************************email for approver who will approve email*********************************/ 
               if($result==1)
          {
               Mail::send( 'emails.cash.user_who_will_approve',['name'=>$user_details->name,'request_no'=>$request_no,'amount'=>$amount], function ($m) use ($user_details) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($user_details->email, $user_details->name)->subject('CSEI |  Request Approved'); });
          }
            /******************************************email for requester*********************************/   
            if($result==1)
          {
                   $verified_approved='approved';
                   Mail::send( 'emails.cash.mail_to_requester_for_va',['logged_user'=>$logger_name,'request_no'=>$request_no,'name'=>$requester->name,'amount'=>$requester->amount,'due_date'=>$requester->due_date,'verified_approved'=>$verified_approved], function ($m) use ($requester) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($requester->email, $requester->name)->subject('CSEI | Request Approved'); });
          }
             return redirect()->route('approvers.requests'); 
         }
         else if($request->approverejected=='Rejected')
         {
         /****************Veri Fy Reject section start here*******************************************************************************/
         $id=  $request->id;
         $comments=  $request->comments;
         $rejector_name= $user_details->name;
         $rejectore_id= $user_details->id;
         $requester_user_id=$request->user_id;
         $request_data= CSEIRequest::whereId($id)->first();
         $request_no=$request_data->request_no;
         $amount= $request_data->amount;
         $due_date  =$request_data->due_date;
         $sql_requester_name= User::whereId($requester_user_id)->first();
         $status = 6; //we assume status is true (1) at the begining;
         $result = CSEIRequest::where('id', $id)->update(['status' =>$status,'rejectore_id'=>$rejectore_id,'comments'=>$comments]); 
         
           /*******************************mail to requester when request reject at verification time***********************************************************************/
       $name= $sql_requester_name->name;
                      if($result==1)
          {
                   Mail::send( 'emails.cash.request_reject_approver_time',['rejector_name'=>$rejector_name,'name'=>$name,'request_no'=>$request_no,'amount'=>$amount,'due_date'=>$due_date,'comments'=>$comments], function ($m) use ($sql_requester_name) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($sql_requester_name->email, $sql_requester_name->name)->subject('CSEI | Request Rejection Mail'); });
          }
          /*******************************mail to approver/financer***********************************************************************/
         if($result==1)
          {
                   Mail::send( 'emails.cash.reject_mail_to_approver',['name'=>$user_details->name,'amount'=>$amount,'request_no'=>$request_no,'comments'=>$comments], function ($m) use ($user_details) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($user_details->email, $user_details->name)->subject('CSEI | Request Rejection Mail'); });
	  }
         /*******************************mail to verifier***********************************************************************/
           return redirect()->route('approvers.requests'); 
        }
        /************************request voucher saved*********************************************************/
        else if($request->finance=='finance')
        {
                $status = 3;
                $financer_id = Auth::id();
                $id = $request->id;
                $result = CSEIRequest::where('id', $id)->update(['status' => $status]);
                $input = $request->all();
                $input['request_id'] = $id;
                $request_data = CSEIRequest::whereId($id)->first();
                $request_no = $request_data->request_no;
                $amount = $request_data->amount;
                $admin = DB::table('users')->select('*')->where('id', 1)->first();
                if ($result == 1) {

                    Mail::send('emails.cash.main_admin_for_approval', ['name' => $admin->name, 'request_no' => $request_no, 'logged_user' => $logged_user, 'amount' => $amount,], function ($m) use ($admin) {
                        $m->from('info@opiant.online', 'CSEI');
                        $m->to($admin->email, $admin->name)->subject('CSEI | Request for Admin Approval');
                    });
                }
                return redirect()->route('finance_approval.requests'); 
         }
        /************************request voucher saved*********************************************************/
        /************************request voucher saved*********************************************************/
        else if($request->admin=='admin')
        {
//        
            $status=4;
            $financer_id= Auth::id();
            $id=$request->id;
            $result=CSEIRequest::where('id', $id)->update(['status' =>$status]);
            $input=  $request->all();
            $input['request_id']=$id;
            $input['date_of_release']=$this->insertDate($request->date_of_release);
            $input['voucher_creater_id']=$request->user_id;
       
            $request_data= CSEIRequest::whereId($id)->first();
            $request_no=$request_data->request_no;
            $amount= $request_data->amount;
            $sql_requester= DB::table('requests')->select('*')->leftjoin('users','users.id','requests.user_id')->where('requests.id',$id)->first();
            /************************************************11 id for coordinator***********************************************************/
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
                    Mail::send( 'emails.cash.coordinator',['name'=>$role_user_value->name,'request_no'=>$request_no,'amount'=>$amount,'logged_user'=>$logged_user], function ($m) use ($role_user_value) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($role_user_value->email, $role_user_value->name)->subject('CSEI |  Request Approved'); });
             }
          }
             return redirect()->route('mainadmin_approval.requests'); 
         }
        /************************request voucher saved*********************************************************/
       
        /************************request voucher saved*********************************************************/
        else if($request->savevoucher=='savevoucher')
        {
       
                $status = 5;
                $id = $request->id;
                $result = CSEIRequest::where('id', $id)->update(['status' => $status]);

                $input = $request->all();
                $input['request_id'] = $id;
                $input['date_of_release'] = $this->insertDate($request_data->request_no);
                // $date_issued=$this->insertDate($request->date_issued);
                $input['voucher_creater_id'] = Auth::id();
                Voucher::create($input);
                $request_data = CSEIRequest::whereId($id)->first();
                $request_no = $request_data->request_no;
                $amount = $request_data->amount;
                $due_date = $request_data->due_date;
              //  
                
                
                $sql_requester = DB::table('requests')->select('*')->leftjoin('users', 'users.id', 'requests.user_id')->where('requests.id', $id)->first();
                /*                 * **********************************************mail to who will save voucher********************************************************** */
                $associates = DB::table('users')->select('*')->where('id', 1)->first();
                $sql_requester = DB::table('requests')->select('*')->leftjoin('users', 'users.id', 'requests.user_id')->where('requests.id', $id)->first();

                //$string= "<p>A request number ".$request_no." for Rs. ".$amount." has been save by ".$associates->name." </p><p>Please<a href=".route('accountants.requests')." >click here</a>to review and submit bills.</p>";
                if ($result == 1) {
                    $associate_name = $associates->name;
                    Mail::send('emails.cash.mail_to_requester_after_save', ['request_no' => $request_no, 'name' => $sql_requester->name, 'amount' => $amount,], function ($m) use ($sql_requester) {
                        $m->from('info@opiant.online', 'CSEI');
                        $m->to($sql_requester->email, $sql_requester->name)->subject('CSEI | Request Completed Successfully');
                    });
                }

                if ($result == 1) {
                    $verified_approved = 'submited';
                    Mail::send('emails.cash.cash_submission', ['logged_user' => $logged_user, 'request_no' => $request_no, 'name' => $user_details->name, 'amount' => $amount, 'verified_approved' => $verified_approved], function ($m) use ($user_details) {
                        $m->from('info@opiant.online', 'CSEI');
                        $m->to($user_details->email, $user_details->name)->subject('CSEI | Cash Request Submitted');
                    });
                }
                return redirect()->route('coordinator.requests');
            }

            $this->request->create($request);
         return redirect()->route('requests.index');
        }
    /***************end cat id 1********************************************************************/
    /***************end cat id 1********************************************************************/
    /***************end cat id 1********************************************************************/
    /***************end cat id 1********************************************************************/
    /***************end cat id 1 line number 74-343********************************************************************/
    /***************start cat id 3 
     * service 
     * service
     * service*********************************************************************************************************************************/
 

        if($request->category_id==3)
     {
     
      if($request->verify=='Verify')
        {
        
         /********************************************************/
        /********************************************************/
           $id=  $request->id;
          $comments=  $request->comments;
          $name_of_project=  $request->name_of_project;
          $project_expense_head=  $request->project_expense_head;
         
          $verifire_name= $user_details->name;
          $verifire_id= $user_details->id;
          $user_id=$request->user_id;
          $request_data= CSEIRequest::whereId($id)->first();
          $request_no=$request_data->request_no;
          //exit();
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
                   Mail::send( 'emails.service.ve_r_to_approver',['verifire_name'=>$verifire_name,'name'=>$name,'request_no'=>$request_no,'amount'=>$amount,'due_date'=>$due_date,'verifier_name'=>$user_details->name], function ($m) use ($a_value) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($a_value->email, $a_value->name)->subject('CSEI | Request for Approval'); });
		}
          }
     
           /************************************mail to verifier******************************************/
          
           if($result==1)
          {
               Mail::send( 'emails.service.user_who_will_verify',['name'=>$user_details->name,'amount'=>$amount,'request_no'=>$request_no], function ($m) use ($user_details) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($user_details->email, $user_details->name)->subject('CSEI | Request Verified'); });
             }
                 
           /************************************mail to requester******************************************/
          if($result==1)
          {
          $verified_approved='verified';
                   Mail::send( 'emails.service.mail_to_requester_for_va',['verifire_name'=>$verifire_name,'name'=>$requester->name,'amount'=>$requester->amount,'due_date'=>$requester->due_date,'verified_approved'=>$verified_approved,'request_no'=>$request_no], function ($m) use ($requester) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($requester->email, $requester->name)->subject('CSEI | Request Verified'); });
             }
		 
             return redirect()->route('verifiers.requests'); 
                  
         }
     else if($request->approve=='Approve')
        {
        
         $id=  $request->id;
         $comments=  $request->comments;
        
         $apporver_name= $user_details->name;
         $approver_id= $user_details->id;
         $user_id=$request->user_id;
         $request_data= CSEIRequest::whereId($id)->first();
         $request_no=$request_data->request_no;
         $amount= $request_data->amount;
         $due_date  =$request_data->due_date;
         $sql_appover= User::whereId($user_id)->first();
         $associates = DB::table('users')->select('*')->where('id',1)->first();
         /****************************************************************************************/
          $requester = DB::table('requests')->select('*','requests.id as id')->leftjoin('users','users.id','requests.user_id')->where('requests.id',$id)->first();
            $status = 3; 
           $result=  CSEIRequest::where('id', $id)->update(['status' =>$status,'approver_id'=>$approver_id]); 
        /******************************************email for associates*********************************/
          if($result==1)
            {
	
                    $name = $associates->name;
                    Mail::send( 'emails.service.associates', ['apporver_name' => $apporver_name,'request_no'=>$request_no,'name' => $name,'associate_name'=>$associates->name,'due_date' => $due_date], function ($m) use ($associates) {
                        $m->from('info@opiant.online', 'CSEI');
                        $m->to($associates->email, $associates->name)->subject('CSEI | Request for Action');
                    });
            
            }
          
    /******************************************email for approver who will approve*********************************/ 
               if($result==1)
          {
               Mail::send( 'emails.service.user_who_will_approve',['name'=>$user_details->name,'request_no'=>$request_no,'amount'=>$amount], function ($m) use ($user_details) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($user_details->email, $user_details->name)->subject('CSEI |  Request Approve'); });
             }
            /******************************************email for requester*********************************/   
            if($result==1)
          {
                   $verified_approved='approved';
                   Mail::send( 'emails.service.mail_to_requester_for_va',['apporver_name'=>$apporver_name,'request_no'=>$request_no,'name'=>$requester->name,'verified_approved'=>$verified_approved], function ($m) use ($requester) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($requester->email, $requester->name)->subject('CSEI | Request Approved'); });
          }
             return redirect()->route('approvers.requests'); 
         }
         
          else if($request->approverejected=='Rejected'){
             /****************Veri Fy Reject section start here*******************************************************************************/
         $id=  $request->id;
         $comments=  $request->comments;
        
         $rejector_name= $user_details->name;
         $rejectore_id= $user_details->id;
         $requester_user_id=$request->user_id;
         $request_data= CSEIRequest::whereId($id)->first();
         $request_no=$request_data->request_no;
         $amount= $request_data->amount;
         $due_date  =$request_data->due_date;
         $sql_requester_name= User::whereId($requester_user_id)->first();
         $status = 6; //we assume status is true (1) at the begining;
         $result = CSEIRequest::where('id', $id)->update(['status' =>$status,'rejectore_id'=>$rejectore_id,'comments'=>$comments]); 
         
           /*******************************mail to requester when request reject at verification time***********************************************************************/
       $name= $sql_requester_name->name;
                      if($result==1)
          {
                   Mail::send( 'emails.service.request_reject_approver_time',['rejector_name'=>$rejector_name,'name'=>$name,'request_no'=>$request_no,'amount'=>$amount,'due_date'=>$due_date,'comments'=>$comments], function ($m) use ($sql_requester_name) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($sql_requester_name->email, $sql_requester_name->name)->subject('CSEI | Request Rejection Mail'); });
          }
          /*******************************mail to approver***********************************************************************/
       
	 $name= $sql_requester_name->name;
                                if($result==1)
          {
                   Mail::send( 'emails.service.reject_mail_to_approver',['rejector_name'=>$rejector_name,'name'=>$name,'amount'=>$amount,'request_no'=>$request_no,'due_date'=>$due_date,'comments'=>$comments], function ($m) use ($sql_requester_name) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($sql_requester_name->email, $sql_requester_name->name)->subject('CSEI | Request Rejection Mail'); });
	  }
    
          /*******************************mail to verifier***********************************************************************/
         
            $verifier_id_user= $request_data->verifire_id;
            $verifier_user= User::whereId($verifier_id_user)->first();
            $name= $verifier_user->name;
              if($result==1)
          {
                   Mail::send( 'emails.service.reject_mail_to_verifier',['rejector_name'=>$rejector_name,'request_no'=>$request_no,'name'=>$name,'amount'=>$amount,'comments'=>$comments], function ($m) use ($verifier_user) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($verifier_user->email, $verifier_user->name)->subject('CSEI | Request Rejection Mail'); });
	  }
          
          return redirect()->route('approvers.requests'); 
        }
        /************************request voucher saved*********************************************************/
        else if($request->service_document=='service_document')
        {
            
        $id=$request->id;
        $input=  $request->all();
        $input['request_id']=$id;
        $input['associate_id']=$request->user_id;
         $directory = "document";  
         $status = 5; //we assume status is true (1) at the begining;
         $result = CSEIRequest::where('id', $id)->update(['status' =>$status]); 
         $request_data= CSEIRequest::whereId($id)->first();
         $request_no=$request_data->request_no;
         $amount= $request_data->amount;
        if ($request->hasFile('document')) {
            if (!is_dir(public_path(). '/images/'. $directory)) {
                mkdir(public_path(). '/images/'. $directory, 0777, true);
            }
            
            $documents = $request->file('document');
            $file_name_csv = "";
            foreach ($documents as $key => $value) {
                $destinationPath = public_path(). '/images/'. $directory;
                $document = str_random(8) . '_' . $value->getClientOriginalName() ;
                $value->move($destinationPath, $document);

                if($key == 0){
                    $file_name_csv .= $document;
                }else{
                    $file_name_csv .= ','.$document;
                }
                
            }            

            $input['document'] = $file_name_csv;
        } 
       $result=  ServiceDocument::create($input);
         
               if($result==1)
          {
                   $verified_approved='document submited';
                   Mail::send( 'emails.service.mail_to_requester_for_va',['apporver_name'=>$apporver_name,'request_no'=>$request_no,'name'=>$user_details->name,'amount'=>$amount,'due_date'=>$requester->due_date,'verified_approved'=>$verified_approved], function ($m) use ($user_details) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($user_details->email, $user_details->name)->subject('CSEI | Request Document Submitted'); });
          }      
          return redirect()->route('requests.index'); 
      } 
    
         $this->request->create($request);
         return redirect()->route('requests.index');
        }  
    /***************end cat id 1********************************************************************/
    /***************end cat id 3********************************************************************/
    /***************end cat id 3********************************************************************/
    /***************end cat id3********************************************************************/
    /***************end cat id 3 line number 74-343********************************************************************/
    /***************start material section*/
   if($request->category_id==2)
   {
      if($request->verify=='Verify')
        {
        
         /********************************************************/
        /********************************************************/
           $id=  $request->id;
          $comments=  $request->comments;
          $name_of_project=  $request->name_of_project;
          $project_expense_head=  $request->project_expense_head;
          
          $verifire_name= $user_details->name;
          $verifire_id= $user_details->id;
          $user_id=$request->user_id;
          $request_data= CSEIRequest::whereId($id)->first();
          $request_no=$request_data->request_no;
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
                   Mail::send( 'emails.material.ve_r_to_approver',['verifire_name'=>$verifire_name,'name'=>$name,'request_no'=>$request_no,'amount'=>$amount,'due_date'=>$due_date,'verifier_name'=>$user_details->name], function ($m) use ($a_value) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($a_value->email, $a_value->name)->subject('CSEI | Request for Approval'); });
		}
          }
     
           /************************************mail to verifier done******************************************/
          
           if($result==1)
          {
               Mail::send( 'emails.material.user_who_will_verify',['name'=>$user_details->name,'amount'=>$amount,'request_no'=>$request_no], function ($m) use ($user_details) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($user_details->email, $user_details->name)->subject('CSEI | Request Verified'); });
             }
                 
           /************************************mail to requester******************************************/
          if($result==1)
          {
          $verified_approved='verified';
                   Mail::send( 'emails.material.mail_to_requester_for_va',['verifire_name'=>$verifire_name,'name'=>$requester->name,'amount'=>$requester->amount,'due_date'=>$requester->due_date,'verified_approved'=>$verified_approved,'request_no'=>$request_no], function ($m) use ($requester) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($requester->email, $requester->name)->subject('CSEI | Request Verified'); });
             }
		 
             return redirect()->route('verifiers.requests'); 
                  
         }
     else if($request->approve=='Approve')
        {
        
         $id=  $request->id;
         $comments=  $request->comments;
        
         $apporver_name= $user_details->name;
         $approver_id= $user_details->id;
         $user_id=$request->user_id;
         $request_data= CSEIRequest::whereId($id)->first();
         $request_no=$request_data->request_no;
         $amount= $request_data->amount;
         $due_date  =$request_data->due_date;
         $sql_appover= User::whereId($user_id)->first();
         $associates = DB::table('users')->select('*')->where('id',1)->first();
          /****************************************************************************************/
          $requester = DB::table('requests')->select('*','requests.id as id')->leftjoin('users','users.id','requests.user_id')->where('requests.id',$id)->first();
          $status = 3; 
           $result=  CSEIRequest::where('id', $id)->update(['status' =>$status,'approver_id'=>$approver_id]); 
        /******************************************email for associates*********************************/
          if($result==1)
            {
	
                    $name = $associates->name;
                    Mail::send( 'emails.material.associates', ['apporver_name' => $apporver_name,'request_no'=>$request_no,'name' => $name,'associate_name'=>$associates->name, 'amount' => $amount, 'due_date' => $due_date], function ($m) use ($associates) {
                        $m->from('info@opiant.online', 'CSEI');
                        $m->to($associates->email, $associates->name)->subject('CSEI | Request for Action');
                    });
            
            }
    /******************************************email for approver who will approver email*********************************/ 
               if($result==1)
          {
               Mail::send( 'emails.material.user_who_will_approve',['name'=>$user_details->name,'request_no'=>$request_no,'amount'=>$amount], function ($m) use ($user_details) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($user_details->email, $user_details->name)->subject('CSEI |  Request Verifed'); });
             }
            /******************************************email for requester*********************************/   
            if($result==1)
          {
                   $verified_approved='approved';
                   Mail::send( 'emails.material.mail_to_requester_for_va',['apporver_name'=>$apporver_name,'request_no'=>$request_no,'name'=>$requester->name,'amount'=>$requester->amount,'due_date'=>$requester->due_date,'verified_approved'=>$verified_approved], function ($m) use ($requester) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($requester->email, $requester->name)->subject('CSEI | Request Approved'); });
          }
             return redirect()->route('approvers.requests'); 
         }
          else if($request->rejected=='Rejected'){
             /****************Reject section start here*******************************************************************************/
         $id=  $request->id;
         $comments=  $request->comments;
       
         $rejector_name= $user_details->name;
         $rejectore_id= $user_details->id;
        
         $requester_user_id=$request->user_id;
         $request_data= CSEIRequest::whereId($id)->first();
         $request_no=$request_data->request_no;
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
                   Mail::send( 'emails.material.request_reject_verification_time',['rejector_name'=>$rejector_name,'request_no'=>$request_no,'name'=>$name,'amount'=>$amount,'due_date'=>$due_date,'comments'=>$comments], function ($m) use ($sql_requester_name) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($sql_requester_name->email, $sql_requester_name->name)->subject('CSEI | Request Rejection Mail'); });
          }
	/*******************************mail to requester verifier***********************************************************************/
         
           if($result==1)
          {
               Mail::send( 'emails.material.reject_mail_to_verifier',['name'=>$user_details->name,'amount'=>$amount,'request_no'=>$request_no], function ($m) use ($user_details) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($user_details->email, $user_details->name)->subject('CSEI | Request Rejection Mail'); });
             }
          
                  return redirect()->route('verifiers.requests'); 
           }
          else if($request->approverejected=='Rejected'){
             /****************Veri Fy Reject section start here*******************************************************************************/
         $id=  $request->id;
         
         $comments=  $request->comments;
      
         $rejector_name= $user_details->name;
         $rejectore_id= $user_details->id;
         $requester_user_id=$request->user_id;
         $request_data= CSEIRequest::whereId($id)->first();
         $request_no=$request_data->request_no;
         $amount= $request_data->amount;
         $due_date  =$request_data->due_date;
         $sql_requester_name= User::whereId($requester_user_id)->first();
         $status = 6; //we assume status is true (1) at the begining;
         $result = CSEIRequest::where('id', $id)->update(['status' =>$status,'rejectore_id'=>$rejectore_id,'comments'=>$comments]); 
         
           /*******************************mail to requester when request reject at verification time***********************************************************************/
       $name= $sql_requester_name->name;
                      if($result==1)
          {
                   Mail::send( 'emails.material.request_reject_approver_time',['rejector_name'=>$rejector_name,'name'=>$name,'request_no'=>$request_no,'amount'=>$amount,'due_date'=>$due_date,'comments'=>$comments], function ($m) use ($sql_requester_name) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($sql_requester_name->email, $sql_requester_name->name)->subject('CSEI | Request Rejection Mail'); });
          }
          /*******************************mail to approver***********************************************************************/
       
	 $name= $sql_requester_name->name;
                                if($result==1)
          {
                   Mail::send( 'emails.material.reject_mail_to_approver',['rejector_name'=>$rejector_name,'name'=>$name,'amount'=>$amount,'request_no'=>$request_no,'due_date'=>$due_date,'comments'=>$comments], function ($m) use ($sql_requester_name) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($sql_requester_name->email, $sql_requester_name->name)->subject('CSEI | Request Rejection Mail'); });
	  }
    
          /*******************************mail to verifier***********************************************************************/
         
            $verifier_id_user= $request_data->verifire_id;
            $verifier_user= User::whereId($verifier_id_user)->first();
            $name= $verifier_user->name;
              if($result==1)
          {
                   Mail::send( 'emails.material.reject_mail_to_verifier',['rejector_name'=>$rejector_name,'request_no'=>$request_no,'name'=>$name,'amount'=>$amount,'comments'=>$comments], function ($m) use ($verifier_user) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($verifier_user->email, $verifier_user->name)->subject('CSEI | Request Rejection Mail'); });
	  }
          
          return redirect()->route('approvers.requests'); 
        }
        /************************request voucher saved*********************************************************/
        else if($request->quotation=='quotation')
        {
            
          /*****vendor mail**************************************************************/
            $vendor_array = implode(',', $request->vendor); 
            $no_of_days=$request->no_of_days;
            $allvendor= Vendor::whereIn('id',$request->vendor)->get();
            /*******************************************************************/ 
            $status=3;
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
            $remark = $request->remark;
            $request_id = $id;
            
            if (strlen(implode($s_no)) > 0) {
                foreach ($s_no as $key => $n) {
                     $rfq_no="RFQ-".$request_id."-".$material_id[$key];
                     DB::table('quotation_details')->insertGetId(['material_id' => $material_id[$key],'request_id' => $request_id, 's_no' => $s_no[$key], 'product_name' => $product_name[$key], 'purchase_quantity' => $purchase_quantity[$key], 'remark' => $remark[$key],'vendor_id'=>$vendor_array,'no_of_days'=>$no_of_days,'rfq_no'=>$rfq_no]
                    );
                }
            } else {
             Session()->flash('flash_message_warning', 'Please add at-least one item to send');
            return redirect()->route('accountants.requests');
            }
       /************************************************mail to who will save voucher***********************************************************/
            
               if($result==1)
            {
	        
               foreach($allvendor as $ven)  
               { 
                 
                    Mail::send( 'emails.material.mail_to_vendor', ['request_no'=>$request_no,'id'=>$request->id,'name' => $ven->name,'amount' => $amount,'vendor_id'=>$ven->id,'material_string'=>$material_string], function ($m) use ($ven) {
                        $m->from('info@opiant.online', 'CSEI');
                        $m->to($ven->email, $ven->name)->subject('CSEI | Quotation Submit');
                    });
            }
            }
      
              $associates = DB::table('users')->select('*')->where('id',1)->first();
             // $sql_requester= DB::table('requests')->select('*')->leftjoin('users','users.id','requests.user_id')->where('requests.id',$id)->first();
             if($result==1)
            {
	            $associate_name = $associates->name;
                    Mail::send( 'emails.material.associate_send_qoutation_successfully', ['request_no'=>$request_no,'name' => $associates->name,'amount' => $amount], function ($m) use ($associates) {
                        $m->from('info@opiant.online', 'CSEI');
                        $m->to($associates->email, $associates->name)->subject('CSEI | Request Completed Successfully');
                    });
            
            }
     
             return redirect()->route('accountants.requests'); 
         }
          
    
         $this->request->create($request);
         return redirect()->route('requests.index');
           
       
   }
        
        
        
        /*
     * Material 
     * Material
     * Material*********************************************************************************************************************************/
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
      public function requestReject($id, Request $request) {
        $user_id = Auth::user();
        $verifire_name = $user_id->name;
        $verifire_id = $user_id->id;

        $user_id = $request->user_id;
        $request_data = CSEIRequest::whereId($id)->first();
        $request_no = $request_data->request_no;
        $amount = $request_data->amount;
        $due_date = $request_data->due_date;
        $sql_appover = User::whereId($user_id)->first();
        $approvers = User::whereIn('id', explode(',', $sql_appover->approvers))->get();
        $status = 2; //we assume status is true (1) at the begining;
        CSEIRequest::where('id', $id)->update(['status' => $status, 'verifire_id' => $verifire_id]);
        foreach ($approvers as $a_value) {
            $name = $a_value->name;
            Mail::send('emails.cash.approvers', ['verifire_name' => $verifire_name, 'name' => $name, 'amount' => $amount, 'due_date' => $due_date], function ($m) use ($a_value) {
                $m->from('info@opiant.online', 'CSEI');
                $m->to($a_value->email, $a_value->name)->subject('Request!');
            });
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
       
        return view('requests.show', compact('requests','request_details','total_voucher','material_details','vendors','material_details_view','material_detail_logs'));
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
              //->orwhere('requests.status',5) 
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
               ->orderBy('requests.id','desc')
              ->where('requests.status',4) 
              ->get();
          return view('requests.coordinator', compact('requests'));
 }


    public function requestsApproved()
    {
    $requests = DB::table('requests')->select('*','requests.id as id','requests.status as status','c_status.name as c_status','categories.name as name','users.name as requester_name','requests.created_at as created_at','requests.updated_at as updated_at')
              ->leftjoin('users','users.id','requests.user_id')
              ->leftjoin('categories','categories.id','requests.category_id')
              ->leftjoin('c_status','c_status.id','requests.status')
             ->orderBy('requests.id','desc')
              ->where('requests.status',3) 
              ->orwhere('requests.status',5) 
               ->get();
  return view('requests.accountant', compact('requests'));
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