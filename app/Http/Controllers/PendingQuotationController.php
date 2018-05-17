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
class PendingQuotationController extends Controller
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
   
     $id= Auth::id();
     $send_to_comparision = DB::table('quotation_send_for_comparision')->select('*')
                ->groupBy('quotation_send_for_comparision.request_id')
               ->get();
      
      foreach($send_to_comparision as $send_to_comparision_value)
      {
     $send_to_comparision_array[]=  $send_to_comparision_value->request_id;   
      }
     
       $pending_quotations = DB::table('vendor_quotation_lists')->select('*')
              ->leftjoin('vendors','vendors.id','vendor_quotation_lists.vendor_id')
              ->leftjoin('requests','requests.id','vendor_quotation_lists.request_id')
              ->groupBy('requests.id')
                ->whereIn('vendor_quotation_lists.request_id',$send_to_comparision_array)
              ->orderBy('requests.id','desc')
              ->get();

    return view('pending_quotations.index', compact('pending_quotations'));
        
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
         return view('pending_quotations.create', compact('roles', 'pending_quotations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
     $associate_id= Auth::id();
     
      $vendor_id    = $request->vendor_id;
        $request_id   = $request->request_id;
        $material_id   = $request->material_id;
        $committee_member_remark   = $request->committee_member_remark;
        PRINT_R($_POST['quotation_approval_id']);
        

        
      print_r($foo);  
        
        echo "<pre>";
        print_r($_POST);
        exit();
        
//        $already=DB::table('pendding_approval_details')->select('*')->where([['vendor_id',$vendor_id[0]],['request_id',$request_id[0]],['associate_id',$associate_id]])->count();
//        if($already>0)
//        {
//           Session::flash('flash_message', "You have already comments this quotation!.");
//           return redirect()->route('pending_quotations.index');
//          exit();
//        }else{
         foreach ($vendor_id as $key => $n) {
             DB::table('pendding_approval_details')->insertGetId(
                    ['associate_id' => $associate_id,'request_id' => $request_id[$key], 'vendor_id' => $vendor_id[$key], 'committee_member_remark' => $committee_member_remark[$key]]
            );
      //  }
           
           }
          
            $committee_menber_user= DB::table('users')->select('*')->whereIn('id',$array_member_id)->get();
          
          /************************************mail to purchase committee member******************************************/
    
             foreach ($committee_menber_user as $a_value) 
		{
                   $name= $a_value->name;
                   Mail::send( 'emails.committee_member.mail_to commitee_member_for_comment',['name'=>$name,'request_no'=>$request_no], function ($m) use ($a_value) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($a_value->email, $a_value->name)->subject('CSEI | Request for Comment'); });
	
                }
           
           
           
           
           
           
           
       Session::flash('flash_message', "Comment approved successfully!.");
       return redirect()->route('pending_quotations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    
      $requests = DB::table('requests')->select('*', 'requests.id as id', 'c_status.name as c_status', 'categories.name as name', 'requests.created_at as created_at')
                ->leftjoin('users', 'users.id', 'requests.user_id')
                ->leftjoin('categories', 'categories.id', 'requests.category_id')
                ->leftjoin('c_status', 'c_status.id', 'requests.status')
                ->orderBy('requests.id', 'desc')
                ->where('requests.id', $id)
                ->first();
        $pending_quotations = DB::table('pending_quotations')->select('*')
                ->leftjoin('requests', 'requests.id', 'pending_quotations.request_id')
                ->leftjoin('vendors', 'vendors.id', 'pending_quotations.vendor_id')
                ->where('pending_quotations.request_id', $id)
                ->groupBy('pending_quotations.vendor_id')
                ->get();
        return view('pending_quotations.show', compact('pending_quotations','requests'));
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
        return view('pending_quotations.edit', compact('pending_quotations'));
    }
    public function Comment($id)
    {
  $request_id=$_REQUEST['request_id'];
  $vendor_id=$_REQUEST['vendor_id'];
 $sql=DB::table('committee_member_comments')->select('*')
    ->leftjoin('users','committee_member_comments.committee_member_id','users.id')
    ->where([['committee_member_comments.request_id',$request_id],['committee_member_comments.vendor_id',$vendor_id]])     
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

        return redirect()->route('pending_quotations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
  
     public function statusUpdate($id)
    {
    $sql=DB::table('pending_quotations')->where('id',$id)->first(); 
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
        return view('pending_quotations.reset')
            ->withToken($token);
    }

    public function setPassword(SetPasswordRequest $request)
    {
        $pending_quotations = $this->pending_quotations->setPassword($request);

        if($pending_quotations)
        {
            Auth::loginUsingId($pending_quotations->id);

            return redirect()->route('home');
        }        
    }
}
