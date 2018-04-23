<?php

namespace App\Http\Controllers;

use App\Models\Role;
//use App\Models\Vendor;
use App\Models\Vendor;
//use App\Models\Vendor;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Vendor\StoreVendorRequest;
use App\Http\Requests\Vendor\UpdateVendorRequest;
use App\Http\Requests\Vendor\SetPasswordRequest;
use App\Repositories\Vendor\VendorRepositoryContract;

class VendorController extends Controller
{
    protected $users;

    public function __construct(VendorRepositoryContract $users)
    {
        $this->users = $users;
        $this->middleware('eitherAdminOrStateAdmin')->except(['createPassword', 'setPassword']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Vendor::select('*')->where('roles',9)->get();
        //print_r($users);
        
        return view('vendors.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name', 'id');
        $users = Vendor::pluck('name', 'id');
        
        
        return view('vendors.create', compact('roles', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendorRequest $request)
    {
        //print_r($request);exit();
        $this->users->create($request);

        return redirect()->route('vendors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $users = Vendor::select('*')->where('roles',$id)->first();
    return view('vendors.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::pluck('display_name', 'id');
        $states = State::orderBy('name', 'ASC')->pluck('name', 'id');
        $user = $this->users->find($id);
        $user->verifiers = Vendor::whereIn('id', explode(',', $user->verifiers))->get()->pluck('id');
        $user->approvers = Vendor::whereIn('id', explode(',', $user->approvers))->get()->pluck('id');
        $users = Vendor::pluck('name', 'id');
        //return response()->json($user);
        return view('vendors.edit', compact('user', 'roles', 'users'));
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
        $this->users->update($request, $id);

        return redirect()->route('vendors.index');
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

    public function createPassword($token)
    {
        return view('users.reset')
            ->withToken($token);
    }

    public function setPassword(SetPasswordRequest $request)
    {
        $user = $this->users->setPassword($request);

        if($user)
        {
            Auth::loginUsingId($user->id);

            return redirect()->route('home');
        }        
    }
}
