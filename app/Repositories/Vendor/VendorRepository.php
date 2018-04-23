<?php 
namespace App\Repositories\Vendor;

use DB;
use App\Models\Vendor;
//use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Repositories\Vendor\VendorRepositoryContract;
use Illuminate\Support\Facades\Hash;
class VendorRepository implements VendorRepositoryContract
{
	public function all()
	{
		if(auth()->user()->hasRole('administrator'))
		{
			$users = Vendor::orderBy('name', 'ASC')
			->with('roles')
			->with('state')->get();
		}else if(auth()->user()->hasRole('state-administrator'))
		{
			$stateId = auth()->user()->state[0]->id;
			$users = Vendor::orderBy('name', 'ASC')
			->with('roles')
			->whereHas('state', function($query) use ($stateId){
				$query->where('state_id', $stateId);
			})->get();
		}
		return $users;
	}

	public function find($id)
	{
		$user = Vendor::findOrFail($id);

		return $user;
	}

	public function create($request)
	{
           
          $input= $request->all(); 

//
//            echo "<pre>";
//            print_r($_POST);
//            echo "</pre>";
//            echo "<pre>";
//            print_r($_FILES);
//            echo "</pre>";
//           //exit();
            
           $request->all(); 
            
                $input[password] = Hash::make($request->password);
		

		if($request->hasFile('registration_no_upload'))
		{
			if(!is_dir(public_path().'/images/registration_no_upload'))
			{
				mkdir(public_path().'/images/registration_no_upload', 0777, true);
			}

			$file = $request->file('registration_no_upload');

			$destinationPath = public_path().'/images/registration_no_upload';
			$fileName = str_random(8).'_'.$file->getClientOriginalName();

			$file->move($destinationPath, $fileName);

			$input[registration_no_upload] = $fileName;
		}
		
		if($request->hasFile('pan_no_upload'))
		{
			if(!is_dir(public_path().'/images/pan_no_upload'))
			{
				mkdir(public_path().'/images/pan_no_upload', 0777, true);
			}

			$file = $request->file('pan_no_upload');

			$destinationPath = public_path().'/images/pan_no_upload';
			$fileName = str_random(8).'_'.$file->getClientOriginalName();

			$file->move($destinationPath, $fileName);

			$input[pan_no_upload] = $fileName;
		}
		
		
                
		if($request->hasFile('gst_no_upload'))
		{
			if(!is_dir(public_path().'/images/gst_no_upload'))
			{
				mkdir(public_path().'/images/gst_no_upload', 0777, true);
			}

			$file = $request->file('gst_no_upload');

			$destinationPath = public_path().'/images/gst_no_upload';
			$fileName = str_random(8).'_'.$file->getClientOriginalName();

			$file->move($destinationPath, $fileName);

			$input[gst_no_upload] = $fileName;
		}
		
                //set manual_reset_password_token
		$input[manual_reset_password_token] = str_random(60);
                Vendor::create($input);
                $ven = new Vendor();
		//$role = $request->roles;
                //$ven->roles()->attach($role);
		
	}

	public function update($request, $id)
	{
		
                $vendors = Vendor::findorFail($id);
                $input = $request->all();
                 if($request->password!='')
                {
                $input[password] =Hash::make($request->password);   
                    
                } else {
                 $input[password] =$user->password;   
                }
                
               if($request->hasFile('registration_no_upload'))
		{
			if(!is_dir(public_path().'/images/registration_no_upload'))
			{
				mkdir(public_path().'/images/registration_no_upload', 0777, true);
			}

			$file = $request->file('registration_no_upload');

			$destinationPath = public_path().'/images/registration_no_upload';
			$fileName = str_random(8).'_'.$file->getClientOriginalName();

			$file->move($destinationPath, $fileName);

			$input[registration_no_upload] = $fileName;
		}
		
		if($request->hasFile('pan_no_upload'))
		{
			if(!is_dir(public_path().'/images/pan_no_upload'))
			{
				mkdir(public_path().'/images/pan_no_upload', 0777, true);
			}

			$file = $request->file('pan_no_upload');

			$destinationPath = public_path().'/images/pan_no_upload';
			$fileName = str_random(8).'_'.$file->getClientOriginalName();

			$file->move($destinationPath, $fileName);

			$input[pan_no_upload] = $fileName;
		}
		
		
                
		if($request->hasFile('gst_no_upload'))
		{
			if(!is_dir(public_path().'/images/gst_no_upload'))
			{
				mkdir(public_path().'/images/gst_no_upload', 0777, true);
			}

			$file = $request->file('gst_no_upload');

			$destinationPath = public_path().'/images/gst_no_upload';
			$fileName = str_random(8).'_'.$file->getClientOriginalName();

			$file->move($destinationPath, $fileName);

			$input[gst_no_upload] = $fileName;
		}

		 $vendors->fill($input)->save();
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
        $user = Vendor::where([['email', $request->email], ['manual_reset_password_token', $request->token]])->firstOrFail();
        $user->password = bcrypt($request->password);
        $user->manual_reset_password_token = null;

        $user->save();

        return $user;
	}
}