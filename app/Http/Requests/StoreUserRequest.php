<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            // 'avatar_image' => ['required'],
            'email' => ['required','email', Rule::unique('users','email')->ignore($this->id, 'id')],
            'name' => ['required', 'min:3'],
            'password' => ['confirmed', Password::min(8)],
            'national_id' => ['required', Rule::unique('users','national_id')->ignore($this->id, 'id'), 'min:14'],
            'role' => ['required'],

            'new_city' => [Rule::unique('cities','name')]
            
            // 'gender' => ['required',],
            // 'date_of_birth' => ['required',],
        ];
    }
}
