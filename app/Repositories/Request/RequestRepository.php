<?php 
namespace App\Repositories\Request;

use DB;
use Auth;
use App\Models\CSEIRequest;
use Illuminate\Support\Facades\Session;
use App\Repositories\Request\RequestRepositoryContract;
use App\Traits\activityLog;
use Mail;
use App\Models\User;

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
        $requester= Auth::user();
         
        $request_no= $this->requestNo($result);
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $input['due_date'] = $this->insertDate($request->due_date);
        $input['required_by_date'] = $this->insertDate($request->required_by_date);
        $input['request_no'] = $request_no;
        $input['status'] = 1;
        $request_id = CSEIRequest::create($input)->id;
        
        $s_no = $request->s_no;
        $brief_details = $request->brief_details;
        $expected_expense = $request->expected_expense;
        $remark = $request->remark;
      
         if (strlen(implode($s_no))> 0)
     {
         foreach ($s_no as $key => $n) {
            $id = DB::table('request_details')->insertGetId(
                    ['request_id' => $request_id, 's_no' => $s_no[$key], 'brief_details' => $brief_details[$key], 'expected_expense' => $expected_expense[$key], 'remark' => $remark[$key]]
            );
        }
        }
        //exit();
         $sql_verifiers = User::where('id', $input['user_id'])->first();
        $verifier = User::whereIn('id', explode(',', $sql_verifiers->verifiers))->get();

        if ($request_id != '') {
            foreach ($verifier as $a_value) {
                $verifire_name = $a_value->name;
                $amount = $request->amount;

                Mail::send('emails.request_to_verifier', ['verifire_name' => $verifire_name, 'amount' => $amount,'requester_name'=>$requester->name], function ($m) use ($a_value) {
                    $m->from('info@opiant.online', 'CSEI');
                    $m->to($a_value->email, $a_value->name)->subject('CSEI | Request for Verification');
                });
            }
        }
          /************************************mail to requester******************************************/
         //$requester = DB::table('requests')->select('*','requests.id as id')->leftjoin('users','users.id','requests.user_id')->where('requests.id',$id)->first();
        if ($request_id != '') {
          $verified_approved='created';
                   Mail::send('emails.mail_to_requester_for_va',['amount'=>$request->amount,'verified_approved'=>$verified_approved,'name'=>$requester->name], function ($m) use ($requester) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($requester->email, $requester->name)->subject('CSEI | Request created'); });
          }
        
        Session::flash('flash_message', "Request Created Successfully."); //Snippet in Master.blade.php
        return $resquests_data;
    }

    public function update($id, $requestData) {
        $this->createLog('App\Models\CSEIRequest', 'App\Models\CSEIRequestLog', $id);
        $CSEIRequest = CSEIRequest::findorFail($id);
        $input = $requestData->all();
        $input['user_id'] = Auth::id();
        $input['due_date'] = $this->insertDate($requestData->due_date);
        $input['required_by_date'] = $this->insertDate($requestData->required_by_date);
        $input['status'] = 1;
        $CSEIRequest->fill($input)->save();
        Session::flash('flash_message', "Request Updated Successfully.");
        return $resquests_data;
        ;
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