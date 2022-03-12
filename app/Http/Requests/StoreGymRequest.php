<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreGymRequest extends FormRequest
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
            'name'=>['required','min:4','string', Rule::unique('gyms','name')->ignore($this->id, 'id')],
            'city_id'=>['required'],
            'cover_image'=>['required'],
            'gym_manager'=>['required'],

            'new_city' => [Rule::unique('cities','name')]
        ];
    }
}