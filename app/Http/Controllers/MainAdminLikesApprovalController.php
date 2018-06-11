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
class MainAdminLikesApprovalController extends Controller
{
    protected $pending_quotations;

//    public function __construct(VendorRepositoryContract $pending_quotations)
//    {
//        $this->pending_quotations = $pending_quotations;
//        $this->middleware('eitherAdminOrStateAdmin')->except(['createPassword', 'setPassword']);
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $user_id= Auth::id();
     
     /********************After somparision like dislike save in committee_member_like_dislikes**********************************************************************************/
      $committee_member_like_dislikes = DB::table('committee_member_like_dislikes')->select('id','request_id')->groupBy('committee_member_like_dislikes.request_id')->get();
         
      foreach($committee_member_like_dislikes as $committee_member_nalue)
      {
     $committee_member_nalue_array[]=  $committee_member_nalue->request_id;   
      }
      $vendor_quotation_lists = DB::table('vendor_quotation_lists')->select('*')
             ->leftjoin('vendors','vendors.id','vendor_quotation_lists.vendor_id')
             ->leftjoin('requests','requests.id','vendor_quotation_lists.request_id')
             ->groupBy('requests.id')
              ->whereIn('vendor_quotation_lists.request_id',$committee_member_nalue_array)
             ->orderBy('requests.id','desc')
              ->get();
      return view('mainadmin_likes_approval.index', compact('vendor_quotation_lists','user_id'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name', 'id');
        $pending_quotations = Vendor::pluck('name', 'id');
         return view('mainadmin_likes_approval.create', compact('roles', 'pending_quotations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
//   echo "<pre>";
//     print_r($_POST);
//    echo "</pre>";
//    
//    exit();

         $main_admin_id = Auth::id();
         $user_id_login= Auth::user();
         $logged_user=$user_id_login->name;
         $vendor_id   = $request->vendor_id;
         $request_id  = $request->request_id;
         $material_id= $request->material_id;
         $userlike    = $request->appoved;
         $approved_vendor_id = $request->approved_vendor_id;
         foreach ($vendor_id as $key => $n) {
             
             //echo "uiuiuiu";
                  DB::table('vendor_finalise_for_purchase_orders')->insertGetId(
                        ['main_admin_id' => $main_admin_id, 'request_id' => $request_id,'material_id'=>$material_id[$key] ,'vendor_id' => $vendor_id[$key],'approved_vendor_id' => $approved_vendor_id[$key]]
                      );
            }
 
        // $finance_head = DB::table('users')->select('*')->whereIn('id',$user_id)->get();
         /****************************************************************************************/
          $request_data= CSEIRequest::whereId($request_id)->first();
         $request_no=$request_data->request_no;
         $amount= $request_data->amount;
         
         /***************email to purchaser********************************************************************************************************************/
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
          Mail::send( 'emails.material.main_admin_send_for_po_suuccessfully', ['request_no'=>$request_no,'name' => $user_id_login->name, 'amount' => $amount,'logged_user'=>$logged_user], function ($m) use ($user_id_login) {
           $m->from('info@opiant.online', 'CSEI');
           $m->to($user_id_login->email, $user_id_login->name)->subject('CSEI | Approve Vendor for PO.');
          });
        
            Session::flash('flash_message', "Approved successfully!.");
            return redirect()->route('mainadmin_likes_approval.index');
    //   }
       // return redirect()->route('mainadmin_likes_approval.index');
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
    $requests = DB::table('requests')->select('*', 'requests.id as id', 'c_status.name as c_status', 'categories.name as name', 'requests.created_at as created_at')
                ->leftjoin('users', 'users.id', 'requests.user_id')
                ->leftjoin('categories', 'categories.id', 'requests.category_id')
                ->leftjoin('c_status', 'c_status.id', 'requests.status')
                ->orderBy('requests.id', 'desc')
                ->where('requests.id', $id)
                ->first();
      
      
       $send_to_comparision = DB::table('quotation_send_for_comparision')->select('*')->where([['quotation_send_for_comparision.approved_vendor_id',1],['quotation_send_for_comparision.request_id',$id]])->get();
      
      foreach($send_to_comparision as $send_to_comparision_value)
      {
      $vendor_id[]=  $send_to_comparision_value->vendor_id;   
      }
      
 
      
        $vendor_quotation_lists = DB::table('vendor_quotation_lists')->select('*')
                ->leftjoin('requests', 'requests.id', 'vendor_quotation_lists.request_id')
                ->leftjoin('vendors', 'vendors.id', 'vendor_quotation_lists.vendor_id')
                ->where('vendor_quotation_lists.request_id', $id)
                ->whereIn('vendor_quotation_lists.vendor_id',$vendor_id)
                ->groupBy('vendor_quotation_lists.vendor_id')
                ->get();
        
       
     
        return view('mainadmin_likes_approval.show', compact('vendor_quotation_lists','requests','user_id'));
    }
   public function SingleVendor()
    {
     $user_id= Auth::id();
     $category_id=3;
     /********************After somparision like dislike save in committee_member_like_dislikes**********************************************************************************/ 
    $quotation_send_for_comparision=DB::table('quotation_send_for_comparision')->select('id','category_id','request_id')->where('category_id',$category_id)->get();
      foreach($quotation_send_for_comparision as $quotation_send_for_comparision_value)
      {
      $request_id[]=  $quotation_send_for_comparision_value->request_id;   
      }
      
      $vendor_quotation_lists = DB::table('vendor_quotation_lists')->select('*')
        ->leftjoin('vendors','vendors.id','vendor_quotation_lists.vendor_id')
        ->leftjoin('requests','requests.id','vendor_quotation_lists.request_id')
        ->groupBy('requests.id')
         ->whereIn('vendor_quotation_lists.request_id',$request_id)
        ->orderBy('requests.id','desc')
         ->get();
      return view('mainadmin_likes_approval.single_vendor_approval', compact('vendor_quotation_lists','user_id','category_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $pending_quotations = $this->pending_quotations->find($id);
        return view('mainadmin_likes_approval.edit', compact('pending_quotations'));
    }
    public function Comment($id)
    {
  $request_id=$_REQUEST['request_id'];
  $vendor_id=$_REQUEST['vendor_id'];
 $sql=DB::table('vendor_finalise_for_purchase_orders')->select('*')
    ->leftjoin('users','vendor_finalise_for_purchase_orders.main_admin_id','users.id')
    ->where([['vendor_finalise_for_purchase_orders.request_id',$request_id],['vendor_finalise_for_purchase_orders.vendor_id',$vendor_id]])     
    ->get();

   ?>
<table align="center" width="100%" style=" background-color:#fff;">
             <tr>
               <td>
                    <table class="table table-bordered table-striped table-hover bank_table">
                        <tr>
                            <th colspan="2" heigh="20px;"><span type="button" class="close" data-dismiss="modal" onclick="closePop()">&times;</span></th>
                        </tr>
                        <tr>
                            <th  class="table-row-heading" width="15%">Commentator</th>
                            <th  class="table-row-heading" width="85%">Comment</th>
                        </tr>
                        <?php foreach ($sql as $value) {
                            ?>

                            <tr>
                                <th style="text-align:left;"><?php echo $value->name; ?></th>
                                <th style="text-align:left;"><?php echo $value->committee_member_remark; ?></th>
                            </tr>
                        <?php } ?>
                    </table>

                </td>
              </tr>
        </table>
   <?php
   
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
        $this->pending_quotations->update($request, $id);

        return redirect()->route('mainadmin_likes_approval.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
  
}
