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
            // 'gym_member' =>  new UserResource($this->gym_member),
            // 'training_session' => new TrainingSession($this->training_session),
            'id' => $this->id,
            'gym_member_name' => $this->gym_member->user->name,
            'training_session_name' => $this->training_session->name,
            'training_session_starts_at' => $this->training_session->starts_at,
            'status' => $this->training_session->starts_at < now() 
                    && $this->training_session->finishes_at > now() 
                    ? 'Active Now' : 'Not Active',
            'gym_name' => $this->training_session->gym->name,
            'city' => $this->training_session->gym->city->name,
            'id' => $this->id
        ];
    }
}