<?php

namespace App\Http\Requests;

use App\Http\Resources\TrainingSessionResource;
use App\Models\TrainingSession;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTrainingSessionRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'min:4', 'string', Rule::unique('training_sessions','name')->ignore($this->id, 'id')],
            'starts_at' => ['required', Rule::unique('training_sessions','starts_at')->ignore($this->id, 'id'), ],      // TODO : finishes at must come after starts at :)
            'finishes_at' => ['required', 'after:starts_at', Rule::unique('training_sessions','finishes_at')->ignore($this->id, 'id')],
            'gym_id' => ['required',],
            'coach_id'=>['required','int'],
        ];
    }
    public function messages(){
        return [
            'coach_id.required'=>'Sorry This Gym Doesn\'t have Coaches',
        ];
    }
}