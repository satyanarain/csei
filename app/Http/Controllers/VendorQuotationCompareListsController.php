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
     $id= Auth::id();
      $send_to_comparision = DB::table('quotation_send_for_comparision')->select('*')->get();
      
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

    return view('vendor_quotation_lists.index', compact('vendor_quotation_lists'));
        
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
        $vendor_id = $request->vendor_id;
        $request_id = $request->request_id;
        $committee_member_remark = $request->committee_member_remark;
        $already=DB::table('committee_member_comments')->select('*')->where([['vendor_id',$vendor_id[0]],['request_id',$request_id[0]],['committee_member_id',$committee_member_id]])->count();
        if ($already > 0) {
            Session::flash('flash_message', "You have already comments this quotation!.");
            return redirect()->route('vendor_quotation_lists.index');
            exit();
        } else {
            foreach ($vendor_id as $key => $n) {
                DB::table('committee_member_comments')->insertGetId(
                        ['committee_member_id' => $committee_member_id, 'request_id' => $request_id[$key], 'vendor_id' => $vendor_id[$key], 'committee_member_remark' => $committee_member_remark[$key]]
                );
            }
            Session::flash('flash_message', "Comment submitted successfully!.");
            return redirect()->route('vendor_quotation_lists.index');
        }
        return redirect()->route('vendor_quotation_lists.index');
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
        return view('vendor_quotation_lists.show', compact('vendor_quotation_lists','requests'));
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
        return view('vendor_quotation_lists.reset')
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
