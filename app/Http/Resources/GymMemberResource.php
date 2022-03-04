<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GymMemberResource extends JsonResource
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
            'user_id' => $this->user_id,
            'gender' => $this->gender,
            'date_of_birth' => $this->date_of_birth,
            'email_verified_at' => $this->email_verified_at,
            'last_login' => $this->last_login,
            'remember_token' => $this->remember_token,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user' => new UserResource($this->user),
            'training_sessions' => new TrainingSessionResource($this->training_sessions),
        ];
    }
}
