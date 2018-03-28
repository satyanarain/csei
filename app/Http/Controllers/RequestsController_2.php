<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\CSEIRequest;
use Illuminate\Http\Request;
use App\Http\Requests\Requests\UpdateRequestsRequest;
use App\Http\Requests\Requests\StoreRequestsRequest;
use App\Repositories\Request\RequestRepositoryContract;
use DB;
class RequestsController extends Controller
{
    public $request;

    public function __construct(RequestRepositoryContract $request)
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
     
      $requests = DB::table('requests')->select('*','requests.id as id','c_status.name as c_status','categories.name as name')
              ->leftjoin('users','users.id','requests.user_id')
              ->leftjoin('categories','categories.id','requests.category_id')
              ->leftjoin('c_status','c_status.id','requests.status')
              ->get();
    
      return view('requests.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('requests.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->request->create($request);

        return redirect()->route('requests.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
          $requests = DB::table('requests')->select('*','requests.id as id','c_status.name as c_status','categories.name as name')
              ->leftjoin('users','users.id','requests.user_id')
              ->leftjoin('categories','categories.id','requests.category_id')
              ->leftjoin('c_status','c_status.id','requests.status')
              ->get();
    
      return view('requests.show', compact('requests'));
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

        return view('requests.edit', compact('categories', 'request'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function update($id,Request $request)
    {
         $this->request->update($id, $request);
        return redirect()->route('requests.index');
   
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function requestsToVerify()
    {
        $userIsVerifierOf = User::where('verifiers', 'LIKE', Auth::id())->get()->pluck('id');
        //return response()->json($userIsVerifierOf);
        $requests = CSEIRequest::where([['status', '0']])
                                ->whereIn('created_by', $userIsVerifierOf)
                                ->get();
        return view('requests.verify', compact('requests'));
    }

    public function requestsToApprove()
    {
        $requests = CSEIRequest::where([['status', '1']])
                                ->whereIn('created_by', explode(',', Auth::user()->approvers))
                                ->get();
        return view('requests.approve', compact('requests'));
    }

    public function requestsToReconcile()
    {
        $requests = CSEIRequest::where('status', '2')->get();
        return view('requests.accountant', compact('requests'));
    }

    public function verifyRequest(Request $request, $id)
    {
        $request = CSEIRequest::whereId($id)->firstOrFail();

    }

    public function approveRequest(Request $request, $id)
    {

    }

    public function rejectRequestVerifier(Request $request, $id)
    {

    }

    public function rejectRequestApprover(Request $request, $id)
    {
        
    }
}
