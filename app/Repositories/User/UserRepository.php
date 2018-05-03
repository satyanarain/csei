<?php 
namespace App\Repositories\User;

use DB;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Repositories\User\UserRepositoryContract;
use Illuminate\Support\Facades\Hash;
use Mail;
class UserRepository implements UserRepositoryContract
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
		$user = new User();

		$user->name = $request->name;
		$user->email = $request->email;
		$user->contact = $request->contact;
               
		$user->password = Hash::make($request->password);
		$user->verifiers = implode(',', $request->verifiers);
		$user->approvers = implode(',', $request->approvers);
		$user->credit_limit = $request->credit_limit;
		$user->status = $request->status;

		if($request->hasFile('profile_picture'))
		{
			if(!is_dir(public_path().'/images/userProfiles'))
			{
				mkdir(public_path().'/images/userProfiles', 0777, true);
			}

			$file = $request->file('profile_picture');

			$destinationPath = public_path().'/images/userProfiles';
			$fileName = str_random(8).'_'.$file->getClientOriginalName();

			$file->move($destinationPath, $fileName);

			$user->profile_picture = $fileName;
		}

		$user->manual_reset_password_token = str_random(60);
               echo  $result=  $user->save();
                $role = $request->roles;
                $user->roles()->attach($role);
            
         
           if($result==1)
          {
               Mail::send('emails.users.user_email',['email'=>$request->email,'name'=>$request->name,'password'=>$request->password], function ($m) use ($request) {
                   $m->from('info@opiant.online', 'CSEI');
                   $m->to($request->email, $request->name)->subject('CSEI | Account Created'); });
             }
         
		return $user;
	}

	public function update($request, $id)
	{
		$user = User::whereId($id)->first();

                if($request->password!='')
                {
                $user->password =Hash::make($request->password);   
                    
                } else {
                 $user->password =$user->password;   
                }
                $user->name = $request->name;
		$user->email = $request->email;
		$user->contact = $request->contact;
		$user->status = $request->status;
		$user->credit_limit = $request->credit_limit;
		$user->verifiers = implode(',', $request->verifiers);
		$user->approvers = implode(',', $request->approvers);

		if($request->hasFile('profile_picture'))
		{
			if(!is_dir(public_path().'/images/userProfiles'))
			{
				mkdir(public_path().'/images/userProfiles', 0777, true);
			}

			$file = $request->file('profile_picture');

			$destinationPath = public_path().'/images/userProfiles';
			$fileName = str_random(8).'_'.$file->getClientOriginalName();

			$file->move($destinationPath, $fileName);

			$user->profile_picture = $fileName;
		}

		$user->save();

		$role = $request->roles;

		$user->roles()->sync($role);

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

	public function setPassword($request)
	{
        $user = User::where([['email', $request->email], ['manual_reset_password_token', $request->token]])->firstOrFail();
        $user->password = bcrypt($request->password);
        $user->manual_reset_password_token = null;

        $user->save();

        return $user;
	}
}