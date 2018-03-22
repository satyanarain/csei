<?php 
namespace App\Observers;

use App\Models\User;
use App\Mail\UserCreated;
use Illuminate\Support\Facades\Mail;

class UserObserver 
{
	public function __construct()
	{
		
	}

	
	/**
	*Listen to User created event
	*@param \App\Models\User $user
	*@return void	
	*/

	public function created(User $user)
	{
		//$url = url('create/password', [$user->manual_reset_password_token]);
		//Mail::to($user->email)->send(new UserCreated($user, $url));
	}
}