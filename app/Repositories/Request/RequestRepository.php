<?php 
namespace App\Repositories\Request;

use DB;
use Auth;
use App\Models\CSEIRequest;
use Illuminate\Support\Facades\Session;
use App\Repositories\Request\RequestRepositoryContract;
use App\Traits\activityLog;

class RequestRepository implements RequestRepositoryContract
{
    use activityLog;
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
                 $input = $request->all();
                 $input['user_id'] = Auth::id();
                 $input['due_date'] = $this->insertDate($request->due_date);
                 $input['status'] = 1;
                 $resquests_data=  CSEIRequest::create($input);
                 Session::flash('flash_message', "Request Created Successfully."); //Snippet in Master.blade.php
                 return $resquests_data;
	}

	    public function update($id, $requestData) {
	       $this->createLog('App\Models\CSEIRequest','App\Models\CSEIRequestLog',$id);
                 $CSEIRequest= CSEIRequest::findorFail($id);
                 $input = $requestData->all();
                 $input['user_id'] = Auth::id();
                 $input['due_date'] = $this->insertDate($requestData->due_date);
                 $input['status'] = 1;
                $CSEIRequest->fill($input)->save();
                 Session::flash('flash_message', "Request Updated Successfully.");
                 return $resquests_data;;

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