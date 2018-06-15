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
class GoodsReceivNotesController extends Controller
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
       $reports = DB::table('requests')->select('*', 'requests.due_date','requests.request_no', 'requests.id as id','vendors.name as vname','prepared_by.name as prepared_by_name', 'requests.status as status', 'c_status.name as c_status', 'categories.name as name', 'users.name as username', 'requests.created_at as created_at', 'requests.updated_at as updated_at')
                        ->rightjoin('purchase_orders', 'requests.id', 'purchase_orders.request_id')
                        ->leftjoin('users', 'users.id', 'requests.user_id')
                        ->leftjoin('vendors', 'vendors.id', 'purchase_orders.vendor_id')
                        ->leftjoin('categories', 'categories.id', 'requests.category_id')
                         ->leftjoin('users as prepared_by','prepared_by.id','purchase_orders.purchaser_id')
                        ->leftjoin('c_status', 'c_status.id', 'requests.status')
                        ->orderBy('requests.id', 'desc')->get();
      return view('goods_receiv_notes.index', compact('reports','user_id'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $categories = Category::pluck('name', 'id');
    return view('goods_receiv_notes.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  created by satya
     * @return 07-06-2018
     */
       public function store(Request $request) {
//   echo "<pre>";
//    print_r($_POST);
//    echo "</pre>";
// 

         $purchaser_id = Auth::id();
         $user_id_login= Auth::user();
         $logged_user=$user_id_login->name;
         $vendor_id   = $request->vendor_id;
         $request_id  = $request->request_id;
         $material_id= $request->material_id;
         $receive_quantity= $request->receive_quantity;
         $recieving= $request->recieving;
         $sql=DB::table('requests')->select('*')->where('id',$request_id)->first();
         $category_id= $sql->category_id;
        // foreach ($vendor_id as $key => $n) {
             DB::table('goods_receiv_notes')->insertGetId(
                        ['purchaser_id' => $purchaser_id, 'request_id' => $request_id,'recieving' => $recieving,'receive_quantity'=>$receive_quantity]
                      );
          //  }
         // $finance_head = DB::table('users')->select('*')->whereIn('id',$user_id)->get();
         /****************************************************************************************/
         $request_data= CSEIRequest::whereId($request_id)->first();
         $request_no=$request_data->request_no;
         $amount= $request_data->amount;
         $vendor=DB::table('vendors')->where('id',$vendor_id)->first();
     
         /*  Mail::send( 'emails.material.email_to_vendor_for_order',['name'=>$vendor->name,'phone'=>$vendor->contact,'request_no'=>$request_no,'amount'=>$amount,'logged_user'=>$logged_user], function ($m) use ($vendor) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($vendor->email, $vendor->name)->subject('CSEI |  Purchase Order.'); });
        
          
          Mail::send( 'emails.material.main_admin_send_for_po_suuccessfully', ['request_no'=>$request_no,'name' => $user_id_login->name, 'amount' => $amount,'logged_user'=>$logged_user], function ($m) use ($user_id_login) {
           $m->from('info@opiant.online', 'CSEI');
           $m->to($user_id_login->email, $user_id_login->name)->subject('CSEI | Approve Vendor for PO.');
          });
*/
          Session::flash('flash_message', "GRN Save Successfully!.");
            return redirect()->route('goods_receiv_notes.index');
      
    }

    /**
     * Created by satya .
     *Date 11-06-2018
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
        public function singleVendorOrder()
    {
     $user_id= Auth::id();
      $vendor_finalise_for_purchase_orders = DB::table('vendor_finalise_for_purchase_orders')->select('id','approved_vendor_id','request_id','vendor_id')->where([['approved_vendor_id',1],['category_id',3]])->get();
         
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
      return view('goods_receiv_notes.single_vendor_purchase_order', compact('vendor_quotation_lists','user_id'));
        
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
       
    $requests = DB::table('requests')->select('*', 'requests.id as id', 'c_status.name as c_status', 'categories.name as name','users.name as username', 'requests.created_at as created_at')
                ->leftjoin('users', 'users.id', 'requests.user_id')
                ->leftjoin('categories', 'categories.id', 'requests.category_id')
                ->leftjoin('c_status', 'c_status.id', 'requests.status')
                ->orderBy('requests.id', 'desc')
                ->where('requests.id', $id)
                ->first();
         $vendor_quotation_lists = DB::table('vendor_quotation_lists')->select('*','purchase_orders.created_at as created_at')
                ->leftjoin('requests', 'requests.id', 'vendor_quotation_lists.request_id')
                ->leftjoin('vendors', 'vendors.id', 'vendor_quotation_lists.vendor_id')
                ->leftjoin('goods_receiv_notes', 'goods_receiv_notes.request_id', 'vendor_quotation_lists.request_id')
                ->leftjoin('purchase_orders', 'purchase_orders.request_id', 'vendor_quotation_lists.request_id')
                ->where('vendor_quotation_lists.request_id', $id)
              ->first();
         return view('goods_receiv_notes.show', compact('vendor_quotation_lists','requests','user_id','total'));
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
        return view('goods_receiv_notes.edit', compact('categories', 'request'));
    }

    
    
}
