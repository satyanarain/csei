<?php 
namespace App\Repositories\Request;

use DB;
use Auth;
use App\Models\CSEIRequest;
use Illuminate\Support\Facades\Session;
use App\Repositories\Request\RequestRepositoryContract;

class RequestRepository implements RequestRepositoryContract
{
	public function all()
	{
		if(auth()->user()->hasRole('administrator'))
		{
			$users = User::orderBy('name', 'ASC')
			->with('roles')
			->with('state')->get();
		}else if(auth()->user()->hasRole('state-administrator'))
		{
			$stateId = auth()->user()->state[0]->id;
			$users = User::orderBy('name', 'ASC')
			->with('roles')
			->whereHas('state', function($query) use ($stateId){
				$query->where('state_id', $stateId);
			})->get();
		}
		

		return $users;
	}

	public function find($id)
	{
		$user = User::findOrFail($id);

		return $user;
	}

	public function create($request)
	{
		$cseirequest = new CSEIRequest();

		$cseirequest->category_id = $request->categories;
		$cseirequest->created_by = Auth::id();
		$cseirequest->amount = $request->amount;
		$cseirequest->purpose = $request->purpose;
		$cseirequest->due_date = $request->due_date;
		$cseirequest->status = CSEIRequest::REQUESTED_REQUEST;

		$cseirequest->save();

		return $cseirequest;
	}

	public function update($request, $id)
	{
		$request = CSEIRequest::whereId($id)->firstOrFail();

		$request->category_id = $request->categories;
		$request->amount = $request->amount;
		$request->purpose = $request->purpose;
		$request->due_date = $request->due_date;
		$request->status = CSEIRequest::REQUESTED_REQUEST;

		$request->save();

		return $request;
	}

	public function destroy($id)
	{
        if ($id !== 1) {
            Role::whereId($id)->delete();
        } else {
            Session()->flash('flash_message_warning', 'Can not delete Administrator role');
        }
	}

	public function setPassword($request)
	{
		$user = User::where([['email', $request->email], ['manual_reset_password_token', $request->token]])->firstOrFail();
        $user->password = bcrypt($request->password);
        $user->manual_reset_password_token = null;

        $user->save();

        return $user;
	}
}