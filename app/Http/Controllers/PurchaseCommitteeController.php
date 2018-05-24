<?php

namespace App\Http\Controllers;

use App\Models\Role;
//use App\Models\PurchaseCommittee;
use App\Models\PurchaseCommittee;
//use App\Models\PurchaseCommittee;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PurchaseCommittee\StorePurchaseCommitteeRequest;
use App\Http\Requests\PurchaseCommittee\UpdatePurchaseCommitteeRequest;
use App\Http\Requests\PurchaseCommittee\SetPasswordRequest;
use App\Repositories\PurchaseCommittee\PurchaseCommitteeRepositoryContract;

class PurchaseCommitteeController extends Controller
{
    protected $purchase_committees;

    public function __construct(PurchaseCommitteeRepositoryContract $purchase_committees)
    {
        $this->purchase_committees = $purchase_committees;
       // $this->middleware('eitherAdminOrStateAdmin')->except(['createPassword', 'setPassword']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase_committees = PurchaseCommittee::all();
       return view('purchase_committees.index', compact('purchase_committees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name', 'id');
        $purchase_committees = PurchaseCommittee::pluck('name', 'id');
         return view('purchase_committees.create', compact('roles', 'purchase_committees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePurchaseCommitteeRequest $request)
    {
        //print_r($request);exit();
        $this->purchase_committees->create($request);

        return redirect()->route('purchase_committees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $purchase_committees = PurchaseCommittee::select('*')->where('id',$id)->first();
    return view('purchase_committees.show', compact('purchase_committees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
     $purchase_committees = $this->purchase_committees->find($id);
   
   
       return view('purchase_committees.edit', compact('purchase_committees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePurchaseCommitteeRequest $request, $id)
    {
        $this->purchase_committees->update($request, $id);

        return redirect()->route('purchase_committees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
   
}
