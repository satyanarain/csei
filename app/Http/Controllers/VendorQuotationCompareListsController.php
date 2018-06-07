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
class VendorQuotationCompareListsController extends Controller
{
    protected $vendor_quotation_lists;

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
     $user_id= Auth::id();
      $send_to_comparision = DB::table('quotation_send_for_comparision')->select('*')->where('quotation_send_for_comparision.approved_vendor_id',1)->get();
      
      foreach($send_to_comparision as $send_to_comparision_value)
      {
     $send_to_comparision_array[]=  $send_to_comparision_value->request_id;   
      }
      $vendor_quotation_lists = DB::table('vendor_quotation_lists')->select('*')
             ->leftjoin('vendors','vendors.id','vendor_quotation_lists.vendor_id')
             ->leftjoin('requests','requests.id','vendor_quotation_lists.request_id')
             ->groupBy('requests.id')
              ->whereIn('vendor_quotation_lists.request_id',$send_to_comparision_array)
             ->orderBy('requests.id','desc')
              ->get();

    return view('vendor_quotation_lists.index', compact('vendor_quotation_lists','user_id'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name', 'id');
        $vendor_quotation_lists = Vendor::pluck('name', 'id');
         return view('vendor_quotation_lists.create', compact('roles', 'vendor_quotation_lists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
  
         $committee_member_id = Auth::id();
         $user_id_login= Auth::user();
         $logged_user=$user_id_login->name;
         $vendor_id   = $request->vendor_id;
         $request_id  = $request->request_id;
         $userlike    = $request->userlike;
         $userdislike = $request->userdislike;
         foreach ($vendor_id as $key => $n) {
             
             //echo "uiuiuiu";
                  DB::table('committee_member_like_dislikes')->insertGetId(
                        ['committee_member_id' => $committee_member_id, 'request_id' => $request_id, 'vendor_id' => $vendor_id[$key],'userdislike' => $userdislike[$key],'userlike' => $userlike[$key]]
                      );
            }
     //  exit();  
        // $finance_head = DB::table('users')->select('*')->whereIn('id',$user_id)->get();
         /****************************************************************************************/
          $request_data= CSEIRequest::whereId($request_id)->first();
         $request_no=$request_data->request_no;
         $amount= $request_data->amount;
         
        /******************************************email for associates*********************************/
         $mainadmin = DB::table('users')->select('*')->where('id',1)->first();
           $name = $mainadmin->name;
          //exit();
          Mail::send( 'emails.material.main_admin_for_commemt', ['request_no'=>$request_no,'name' => $name, 'amount' => $amount,'logged_user'=>$logged_user], function ($m) use ($mainadmin) {
           $m->from('info@opiant.online', 'CSEI');
           $m->to($mainadmin->email, $mainadmin->name)->subject('CSEI | Request for vendor quotation approve');
          });
        
            Session::flash('flash_message', "Approved successfully!.");
            return redirect()->route('vendor_quotation_lists.index');
    //   }
       // return redirect()->route('vendor_quotation_lists.index');
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
        
       
     
        return view('vendor_quotation_lists.show', compact('vendor_quotation_lists','requests','user_id'));
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
        return view('vendor_quotation_lists.edit', compact('vendor_quotation_lists'));
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

        return redirect()->route('vendor_quotation_lists.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
  

}
