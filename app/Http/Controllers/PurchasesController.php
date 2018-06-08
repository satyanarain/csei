<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\CSEIRequest;
use Illuminate\Http\Request;
use App\Http\Requests\Purchase\UpdatePurchasesRequest;
use App\Http\Requests\Purchase\StorePurchasesRequest;
use App\Repositories\Purchase\PurchaseRepositoryContract;
use DB;
use Session;
use Mail;
use \App\Traits\activityLog;
class PurchasesController extends Controller
{
public $request;
use activityLog;
    public function __construct(PurchaseRepositoryContract $request)
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
     $user_id= Auth::id();
      $vendor_finalise_for_purchase_orders = DB::table('vendor_finalise_for_purchase_orders')->select('id','approved_vendor_id','request_id','vendor_id')->where('approved_vendor_id',1)->get();
         
      foreach($vendor_finalise_for_purchase_orders as $committee_member_nalue)
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
      return view('purchases.index', compact('vendor_quotation_lists','user_id'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('purchases.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  created by satya
     * @return 07-06-2018
     */
       public function store(Request $request) {
   echo "<pre>";
    print_r($_POST);
    echo "</pre>";
 

         $purchaser_id = Auth::id();
         $user_id_login= Auth::user();
         $logged_user=$user_id_login->name;
         $vendor_id   = $request->vendor_id;
         $request_id  = $request->request_id;
         $material_id= $request->material_id;
         $po_number= $request->po_number;
       
        // foreach ($vendor_id as $key => $n) {
             DB::table('purchase_orders')->insertGetId(
                        ['purchaser_id' => $purchaser_id, 'request_id' => $request_id,'vendor_id' => $vendor_id,'po_number' => $po_number]
                      );
          //  }
         // $finance_head = DB::table('users')->select('*')->whereIn('id',$user_id)->get();
         /****************************************************************************************/
         $request_data= CSEIRequest::whereId($request_id)->first();
         $request_no=$request_data->request_no;
         $amount= $request_data->amount;
         $vendor=DB::table('vendors')->where('id',$vendor_id)->first();
         /***************email to purchaser********************************************************************************************************************/
           Mail::send( 'emails.material.email_to_vendor_for_order',['name'=>$vendor->name,'phone'=>$vendor->contact,'request_no'=>$request_no,'amount'=>$amount,'logged_user'=>$logged_user], function ($m) use ($vendor) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($vendor->email, $vendor->name)->subject('CSEI |  Purchase Order.'); });
        
          /******************************************email for admin to apprved vender successfully*********************************/
          Mail::send( 'emails.material.main_admin_send_for_po_suuccessfully', ['request_no'=>$request_no,'name' => $user_id_login->name, 'amount' => $amount,'logged_user'=>$logged_user], function ($m) use ($user_id_login) {
           $m->from('info@opiant.online', 'CSEI');
           $m->to($user_id_login->email, $user_id_login->name)->subject('CSEI | Approve Vendor for PO.');
          });
        
            Session::flash('flash_message', "Approved successfully!.");
            return redirect()->route('purchases.index');
 
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
            
    $total= DB::table('purchase_orders')->count(); 

    if($total==0){
       $total=1; 
    } else {
     $total=$total+1;   
    }
       
    $requests = DB::table('requests')->select('*', 'requests.id as id', 'c_status.name as c_status', 'categories.name as name', 'requests.created_at as created_at')
                ->leftjoin('users', 'users.id', 'requests.user_id')
                ->leftjoin('categories', 'categories.id', 'requests.category_id')
                ->leftjoin('c_status', 'c_status.id', 'requests.status')
                ->orderBy('requests.id', 'desc')
                ->where('requests.id', $id)
                ->first();
         $vendor_quotation_lists = DB::table('vendor_quotation_lists')->select('*')
                ->leftjoin('requests', 'requests.id', 'vendor_quotation_lists.request_id')
                ->leftjoin('vendors', 'vendors.id', 'vendor_quotation_lists.vendor_id')
                ->where('vendor_quotation_lists.request_id', $id)
              ->first();
         return view('purchases.show', compact('vendor_quotation_lists','requests','user_id','total'));
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
        return view('purchases.edit', compact('categories', 'request'));
    }

    
    
}
