<?php

namespace App\Http\Requests\Vendor;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVendorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::check())
        {
            return true;
        }else {
            return false;
            
        }
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'roles' => 'required',
            'state' => 'required_if:roles,2'
        ];
    }

    public function message()
    {
        return [
            'name.required' => 'Name field is required.',
            'email.required' => 'Email filed is required.',
            'email.email' => 'Email must be a valid email.',
            'email.unique' => 'This email is already registered.',
            'roles.required' => 'Role field is required.',
            'state.required_id' => 'State field is required if role is state admin.'
        ];
    }
}
