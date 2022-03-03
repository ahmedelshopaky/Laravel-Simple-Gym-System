<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;

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
            'avatar_image' => ['required'],
            'email' => ['required','email'],
            'name' => ['required', 'min:3'],
            'password' => ['required', 'confirmed', Password::min(8)],
            'national_id' => ['required', 'unique:users', 'min:14'],

            // 'gender' => ['required',],
            // 'date_of_birth' => ['required',],
        ];
    }
}
