<?php

namespace App\Http\Requests\Permission;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StorePermissionRequest extends FormRequest
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
        }
        else 
        {
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
            'name' => 'required|unique:permissions,name',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name filed is required.',
            'name.unique' => 'Permission already created.',
            'description.required' => 'Description filed is required.',
        ];
    }
}
