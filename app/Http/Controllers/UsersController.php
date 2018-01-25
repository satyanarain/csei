<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\SetPasswordRequest;
use App\Repositories\User\UserRepositoryContract;

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

        //return response()->json($users);
        return view('users.index')
            ->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->hasRole('administrator'))
        {
            $roles = Role::pluck('display_name', 'id');
        }else if(auth()->user()->hasRole('state-administrator')){
            $roles = Role::whereId('3')->pluck('display_name', 'id');
        }

        if(auth()->user()->hasRole('administrator'))
        {
            $states = State::orderBy('name', 'ASC')->pluck('name', 'id');
        }else if(auth()->user()->hasRole('state-administrator')){
            $stateId = auth()->user()->state[0]->id;
            $states = State::whereId($stateId)->orderBy('name', 'ASC')->pluck('name', 'id');
        }
        
        return view('users.create')
            ->withRoles($roles)
            ->withStates($states);
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

        return view('users.show')
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

        return view('users.edit')
            ->withUser($user)
            ->withRoles($roles)
            ->withStates($states);
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
}
