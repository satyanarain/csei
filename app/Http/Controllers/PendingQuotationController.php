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

    public function __construct(VendorRepositoryContract $pending_quotations)
    {
        $this->pending_quotations = $pending_quotations;
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
     $pending_quotations = DB::table('vendor_quotation_lists')->select('*')
              ->leftjoin('vendors','vendors.id','vendor_quotation_lists.vendor_id')
              ->leftjoin('requests','requests.id','vendor_quotation_lists.request_id')
             
             ->groupBy('requests.id')
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
        $committee_member_remark   = $request->committee_member_remark;
//        echo "<pre>";
//        print_r($_POST);
//          exit();
//        
      
       $already=DB::table('committee_member_comments')->select('*')->where([['vendor_id',$vendor_id[0]],['request_id',$request_id[0]],['associate_id',$associate_id]])->count();
        if($already>0)
        {
           //echo "You have already submitted this quotation";
           Session::flash('flash_message', "You have already comments this quotation!.");
           return redirect()->route('pending_quotations.index');
          exit();
        }else{
            
            
        foreach ($vendor_id as $key => $n) {
            
     
            DB::table('committee_member_comments')->insertGetId(
                    ['associate_id' => $associate_id,'request_id' => $request_id[$key], 'vendor_id' => $vendor_id[$key], 'committee_member_remark' => $committee_member_remark[$key]]
            );
        }
            Session::flash('flash_message', "Comment submitted successfully!.");
           return redirect()->route('pending_quotations.index');
           }
        

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
     
     echo "=======================" ;
  exit();
    
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
