<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreManagerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:3'],
            'email' => ['required','email'],
            'gender' => ['required'],
            'password' => ['required', 'confirmed', Password::min(8)],
            'date_of_birth' => ['required', 'date'],
            'profile_image' => ['required', 'file','size:512'],
        ];
    }
}
