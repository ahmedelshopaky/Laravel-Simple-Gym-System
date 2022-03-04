<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Date;
use Illuminate\Validation\Rule;

class UpdateGymMemberRequest extends FormRequest
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
            'avatar_image' => ['mimes:png,jpg,jpeg','max:2048'],
            'email' => ['email',Rule::unique('users','email')->ignore($this->id, 'id')],
            'name' => ['min:3'],
            'password' => [Password::min(8)],
            'national_id' => [Rule::unique('users', 'national_id')->ignore($this->id, 'id'), 'min:14'],
            'gender' => [Rule::in(['male','female','Male','Female'])],
            'date_of_birth' => ['date'],
        ];
    }


    public function messages()
    {
        return [
            'name.min' => 'A name must be more than 3 characters',
            'national_id.min' => 'National Id must be 14 numbers',
            'avatar_image.mimes' => 'An avatar_image extension must be jpg or jpeg only',
            'password.min' => 'A password must at least 8 characters',
        ];
    }
}
