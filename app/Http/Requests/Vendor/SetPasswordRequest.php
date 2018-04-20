<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|confirmed|min:5'
        ];
    }

    public function message()
    {
        return [
            'email.required' => 'Email field is required.',
            'email.email' => 'Email must be a valid email.',
            'password.required' => 'Password field is required.',
            'password.confirmed' => 'Password must match the confirmation password.',
            'password.min' => 'Password must be atleast 5 character long.'
        ];
    }
}
