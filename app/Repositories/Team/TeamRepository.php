<?php 
namespace App\Repositories\Team;

use DB;
use App\Models\Team;
//use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Repositories\Team\TeamRepositoryContract;
use Illuminate\Support\Facades\Hash;
class TeamRepository implements TeamRepositoryContract
{
	public function all()
	{
		if(auth()->user()->hasRole('administrator'))
		{
			$users = Team::orderBy('name', 'ASC')
			->with('roles')
			->with('state')->get();
		}else if(auth()->user()->hasRole('state-administrator'))
		{
			$stateId = auth()->user()->state[0]->id;
			$users = Team::orderBy('name', 'ASC')
			->with('roles')
			->whereHas('state', function($query) use ($stateId){
				$query->where('state_id', $stateId);
			})->get();
		}
		return $users;
	}

	public function find($id)
	{
		$user = Team::findOrFail($id);

		return $user;
	}

	public function create($request)
	{
           $input= $request->all(); 
          Team::create($input);
       }

       public function update($request, $id) {
        $teams = Team::findorFail($id);
        $input = $request->all();
        $teams->fill($input)->save();
        return $user;
        }

    public function destroy($id)
	{
        if ($id !== 1) {
            Role::whereId($id)->delete();
        } else {
            Session()->flash('flash_message_warning', 'Can not delete Administrator role');
        }
	}

}