<?php 
namespace App\Observers;

use Auth;
use App\Models\User;
use App\Mail\UserCreated;
use App\Models\CSEIRequest;
use App\Mail\RequestCreated;
use Illuminate\Support\Facades\Mail;

class RequestObserver 
{
	public function __construct()
	{
		
	}

	
	/**
	*Listen to User created event
	*@param \App\Models\User $user
	*@return void	
	*/

	public function created(CSEIRequest $request)
	{
		//Mail::to('subash_chandra@opiant.in')->send(new RequestCreated(Auth::user(), $request));
		$verifiers = User::whereIn('id', explode(',', Auth::user()->verifiers))->get();
		foreach ($verifiers as $key => $verifier) 
		{
			Mail::to($verifier->email)->send(new RequestCreated($verifier, $request));
		}
	}
}