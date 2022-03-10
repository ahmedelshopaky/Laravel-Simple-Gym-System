<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTrainingPackageRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'min:4', 'string', Rule::unique('training_packages','name')->ignore($this->id, 'id')],
            'sessions_number' => ['required', 'integer'],
            'price' => ['required', 'integer', 'min:200'],
        ];
    }
}
