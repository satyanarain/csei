<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\SetPasswordRequest;
use App\Repositories\User\UserRepositoryContract;
use DB;
class UsersController extends Controller
{
    protected $users;

    public function __construct(UserRepositoryContract $users)
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
        $users = $this->users->all();
        foreach ($users as $key => $user) {
            $user->verifiers = User::whereIn('id', explode(',', $user->verifiers))->get();
            $user->approvers = User::whereIn('id', explode(',', $user->approvers))->get();
        }

        //return response()->json($users);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name', 'id');
        $users = User::pluck('name', 'id');
        
        
        return view('users.create', compact('roles', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //print_r($request);exit();
        $this->users->create($request);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->users->find($id);
        
        $role_sql=DB::table('role_user')->select('*')->leftJoin('roles','role_user.user_id','roles.id')->where('role_user.user_id',$id)->get();
        foreach($role_sql as $role_id)
        {
          $roleid_array[]=  $role_id->role_id;
        }
       $roleid_array = implode(',', $roleid_array);
       
        return view('users.show',compact('roleid_array'))
            ->withUser($user);
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

        $user->verifiers = User::whereIn('id', explode(',', $user->verifiers))->get()->pluck('id');
        $user->approvers = User::whereIn('id', explode(',', $user->approvers))->get()->pluck('id');
        $users = User::pluck('name', 'id');
        //return response()->json($user);
        return view('users.edit', compact('user', 'roles', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $this->users->update($request, $id);

        return redirect()->route('users.index');
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
    
     public function statusUpdate($id)
    {
    $sql=DB::table('users')->where('id',$id)->first(); 
     if($sql->status==0)
       {
       $status=  $sql->status;
       $user = User::findorFail($id);
       $user->status=1;
       $user->save();
       echo 1;
      }else
       {
       $status=  $sql->status;
       $user = User::findorFail($id);
       $user->status=0;
       $user->save();
       echo 0;
       }
    }
    
    
}
