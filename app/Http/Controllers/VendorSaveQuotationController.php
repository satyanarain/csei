<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\CSEIRequest;
//use App\Models\Quotation;
use App\Models\Quotation;
//use App\Models\Quotation;
use App\Models\State;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//use App\Http\Requests\Quotation\StoreQuotationRequest;
//use App\Http\Requests\Quotation\UpdateQuotationRequest;
use App\Http\Requests\Quotation\SetPasswordRequest;
//use App\Repositories\Quotation\QuotationRepositoryContract;
use Illuminate\Support\Facades\Session;
use DB;
use DateTime;
class VendorSaveQuotationController extends Controller
{
    //protected $quotations;

//    public function __construct(QuotationRepositoryContract $quotations)
//    {
//        $this->quotations = $quotations;
//      //  $this->middleware('eitherAdminOrStateAdmin')->except(['createPassword', 'setPassword']);
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $url = $_SERVER[REQUEST_URI];
        $array = explode('&', $url);
        $vendor_id = $array[1];
        $url_array = explode('?', $array[0]);
        $request_id = $url_array[1];
        $material_id_string = $array[2];
        $material_id_array = explode(',', $material_id_string);
        $material_id = $material_id_array[0];
        
         $requests= CSEIRequest::whereId($request_id)->first();
        
        $sql = DB::table('quotation_details')->select('*')->where([['material_id', $material_id], ['request_id', $request_id]])->first();
        $qoutation_created_date = $sql->created_at;
        $no_of_days = $sql->no_of_days;

        $curdate = date('Y-m-d H:i:s');
        $date1 = new DateTime(date('Y-m-d', strtotime($sql->created_at)));
        $date2 = new DateTime(date('Y-m-d', strtotime($curdate)));
        $expecteddate = $date1->diff($date2)->days; // 0
        
                if($no_of_days != '')
                {
                if ($expecteddate > $no_of_days) {
                return view('quotations.expire', compact('quotations', 'vendor_id', 'request_id'));
                } else {

                $quotations = DB::table('quotation_details')->select('*')
                ->leftjoin('requests', 'requests.id', 'quotation_details.request_id')
                ->where('quotation_details.request_id', $request_id)
                ->whereIn('quotation_details.material_id', $material_id_array)->get();
                }
                
                }else {
                $quotations = DB::table('quotation_details')->select('*')
                ->leftjoin('requests', 'requests.id', 'quotation_details.request_id')
                ->where('quotation_details.request_id', $request_id)
                ->whereIn('quotation_details.material_id', $material_id_array)->get();
                }

            return view('quotations.index', compact('quotations','vendor_id','request_id','requests'));
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name', 'id');
        $quotations = Quotation::pluck('name', 'id');
         return view('quotations.create', compact('roles', 'quotations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $requestData)
    {

        $input = $requestData->all();
        $vendor_id    = $requestData->vendor_id;
        $request_id   = $requestData->request_id;
        $material_id  = $requestData->material_id;
        $material_id_url  = implode(',',$material_id);
        $s_no = $requestData->s_no;
        $product_name = $requestData->product_name;
        $purchase_quantity = $requestData->purchase_quantity;
        $purchase_unit_rate = $requestData->purchase_unit_rate;
        $purchase_unit_amount = $requestData->purchase_unit_amount;
        $remark = $requestData->remark;
        $vendor_remark = $requestData->vendor_remark;
        
       $already=DB::table('vendor_quotation_lists')->select('*')->where([['vendor_id',$vendor_id],['request_id',$request_id]])->whereIn('material_id',$material_id)->count();
        if($already>0)
        {
           //echo "You have already submitted this quotation";
           Session::flash('flash_message', "You have already submitted this quotation!.");
           return redirect()->route('quotations.index', [$request_id,$vendor_id,$material_id_url]);
          exit();
        }else{
        foreach ($s_no as $key => $n) {
            DB::table('vendor_quotation_lists')->insertGetId(
                    ['request_id' => $request_id, 'vendor_id' => $vendor_id, 'material_id' => $material_id[$key], 's_no' => $s_no[$key], 'product_name' => $product_name[$key], 'purchase_quantity' => $purchase_quantity[$key], 'purchase_unit_rate' => $purchase_unit_rate[$key], 'purchase_unit_amount' => $purchase_unit_amount[$key],'remark' => $remark[$key],'vendor_remark' => $vendor_remark[$key]]
            );
        }
            Session::flash('flash_message', "Quotation submitted successfully!.");
           return redirect()->route('quotations.index', [$request_id,$vendor_id,$material_id_url]);
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
    $quotations = Quotation::select('*')->where('id',$id)->first();
    return view('quotations.show', compact('quotations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $quotations = $this->quotations->find($id);
     return view('quotations.edit', compact('quotations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuotationRequest $request, $id)
    {
        $this->quotations->update($request, $id);

        return redirect()->route('quotations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
  
     public function statusUpdate($id)
    {
    $sql=DB::table('quotations')->where('id',$id)->first(); 
     if($sql->status==0)
       {
       $status=  $sql->status;
       $vendor = Quotation::findorFail($id);
       $vendor->status=1;
       $vendor->save();
       echo 1;
      }else
       {
       $status=  $sql->status;
       $vendor = Quotation::findorFail($id);
       $vendor->status=0;
       $vendor->save();
       echo 0;
       }
    }
    public function createPassword($token)
    {
        return view('quotations.reset')
            ->withToken($token);
    }

    public function setPassword(SetPasswordRequest $request)
    {
        $quotations = $this->quotations->setPassword($request);

        if($quotations)
        {
            Auth::loginUsingId($quotations->id);

            return redirect()->route('home');
        }        
    }
}
