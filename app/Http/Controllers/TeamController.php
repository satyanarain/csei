<?php

namespace App\Http\Controllers;

use App\Models\Role;
//use App\Models\Team;
use App\Models\Team;
//use App\Models\Team;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Team\StoreTeamRequest;
use App\Http\Requests\Team\UpdateTeamRequest;
use App\Http\Requests\Team\SetPasswordRequest;
use App\Repositories\Team\TeamRepositoryContract;

class TeamController extends Controller
{
    protected $teams;

    public function __construct(TeamRepositoryContract $teams)
    {
        $this->teams = $teams;
        $this->middleware('eitherAdminOrStateAdmin')->except(['createPassword', 'setPassword']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
       return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name', 'id');
        $teams = Team::pluck('name', 'id');
         return view('teams.create', compact('roles', 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamRequest $request)
    {
        //print_r($request);exit();
        $this->teams->create($request);

        return redirect()->route('teams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $teams = Team::select('*')->where('id',$id)->first();
    return view('teams.show', compact('teams'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $teams = $this->teams->find($id);
       return view('teams.edit', compact('teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeamRequest $request, $id)
    {
        $this->teams->update($request, $id);

        return redirect()->route('teams.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
   
}
