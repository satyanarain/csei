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
     $id= Auth::id();
     $purchases = DB::table('purchases')->select('*')->get();
            // ->select('*','purchases.id as id','c_status.name as c_status','categories.name as name','purchases.created_at as created_at','purchases.updated_at as updated_at')
              //->leftjoin('users','users.id','purchases.user_id')
              //->leftjoin('categories','categories.id','purchases.category_id')
              //->leftjoin('c_status','c_status.id','purchases.status')
              // ->where('purchases.user_id',$id)
            //  ->get();
     return view('purchases.index', compact('purchases'));
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
     * @return 29-12-2018
     */
    public function store(Request $request)
    {
       $this->request->create($request);
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
       $purchases = DB::table('purchases')->select('*','c_status.name as c_status','categories.name as cat_name','users.name as requester_name','purchases.created_at as created_at','purchases.updated_at as updated_at','purchases.id as id')
              ->leftjoin('users','users.id','purchases.user_id')
              ->leftjoin('categories','categories.id','purchases.category_id')
              ->leftjoin('c_status','c_status.id','purchases.status')
              //->where('purchases.user_id',$user_id)
              ->where('purchases.id',$id)
              ->first();
      return view('purchases.show', compact('purchases'));
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
