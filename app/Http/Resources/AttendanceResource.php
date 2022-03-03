<?php

namespace App\Http\Resources;

use App\Models\TrainingSession;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
          
             'gym_member' =>  new UserResource($this->gym_member),
            'training_session' => new TrainingSession($this->training_session),
        ];
    }
}
