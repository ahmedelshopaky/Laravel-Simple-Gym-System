<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->id,
            'avatar_image' => $this->avatar_image,
            'email' => $this->email,
            'name' => $this->name,
            'national_id' => $this->national_id,
            'password' => $this->password,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'gym_member' => new GymMemberResource($this->gym_member),
            'gym_manager' => new GymManagerResource($this->gym_manager),
            'city_manager' => new CityManagerResource($this->city_manager),
        ];
    }
}
