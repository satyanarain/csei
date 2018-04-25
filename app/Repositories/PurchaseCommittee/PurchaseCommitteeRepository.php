<?php 
namespace App\Repositories\PurchaseCommittee;

use DB;
use App\Models\PurchaseCommittee;
//use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Repositories\PurchaseCommittee\PurchaseCommitteeRepositoryContract;
use Illuminate\Support\Facades\Hash;
class PurchaseCommitteeRepository implements PurchaseCommitteeRepositoryContract
{
	public function all()
	{
		if(auth()->user()->hasRole('administrator'))
		{
			$users = PurchaseCommittee::orderBy('name', 'ASC')
			->with('roles')
			->with('state')->get();
		}else if(auth()->user()->hasRole('state-administrator'))
		{
			$stateId = auth()->user()->state[0]->id;
			$users = PurchaseCommittee::orderBy('name', 'ASC')
			->with('roles')
			->whereHas('state', function($query) use ($stateId){
				$query->where('state_id', $stateId);
			})->get();
		}
		return $users;
	}

	public function find($id)
	{
		$user = PurchaseCommittee::findOrFail($id);

		return $user;
	}

	public function create($request)
	{
           $input= $request->all(); 
           $input[member_id]=implode(',',$request->member_id);
           
          PurchaseCommittee::create($input);
       }

       public function update($request, $id) {
        $teams = PurchaseCommittee::findorFail($id);
        $input = $request->all();
        $input[member_id]=implode(',',$request->member_id);
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