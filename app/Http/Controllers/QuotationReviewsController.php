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
class QuotationReviewsController extends Controller
{
    protected $vendor_quotation_lists;

    public function __construct(VendorRepositoryContract $vendor_quotation_lists)
    {
        $this->vendor_quotation_lists = $vendor_quotation_lists;
        $this->middleware('eitherAdminOrStateAdmin')->except(['createPassword', 'setPassword']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $id= Auth::id();
     $vendor_quotation_lists = DB::table('vendor_quotation_lists')->select('*')
              ->leftjoin('vendors','vendors.id','vendor_quotation_lists.vendor_id')
              ->leftjoin('requests','requests.id','vendor_quotation_lists.request_id')
             ->groupBy('requests.id')
             ->orderBy('requests.id','desc')
              ->get();

    return view('quotation_reviews.index', compact('vendor_quotation_lists'));
        
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
    
      $associate_id= Auth::id();
      $request_id   = $request->request_id;
      $request_data= CSEIRequest::whereId($request_id)->first();
      $request_no=$request_data->request_no;
      
      
       DB::table('quotation_send_for_comparision')->insertGetId( ['associate_id' => $associate_id,'request_id' => $request_id]);
   
         $committee_menber= DB::table('purchase_committees')->select('*')->get();
         
          foreach ($committee_menber as $a) 
		{
             $member_id= $a->member_id;
             $array_member_id= explode(',', $member_id);
            $committee_menber_user= DB::table('users')->select('*')->whereIn('id',$array_member_id)->get();
          
          /************************************mail to purchase committee member******************************************/
    
             foreach ($committee_menber_user as $a_value) 
		{
                   $name= $a_value->name;
                   Mail::send( 'emails.committee_member.mail_to commitee_member_for_comment',['name'=>$name,'request_no'=>$request_no], function ($m) use ($a_value) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($a_value->email, $a_value->name)->subject('CSEI | Request for Comment'); });
		}
        }   
             
            Session::flash('flash_message', "Send For rewiew successfully!.");
           return redirect()->route('quotation_reviews.index');
        
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
        $vendor_quotation_lists = DB::table('vendor_quotation_lists')->select('*')
                ->leftjoin('requests', 'requests.id', 'vendor_quotation_lists.request_id')
                ->leftjoin('vendors', 'vendors.id', 'vendor_quotation_lists.vendor_id')
                ->where('vendor_quotation_lists.request_id', $id)
                ->groupBy('vendor_quotation_lists.vendor_id')
                ->get();
        return view('quotation_reviews.show', compact('vendor_quotation_lists','requests'));
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
