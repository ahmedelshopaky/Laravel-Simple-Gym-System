<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RevenueResource extends JsonResource
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
            // 'gym_members' => new GymMemberResource($this->gym_members),
            // 'gym' => new GymResource($this->gym),
            // 'training_packages' => new TrainingPackageResource($this->training_packages),
            'amount_paid' => '$' . $this->amount_paid / 100,
            'id' => $this->id,

            'training_package_name' => $this->training_packages->first()->name,
            'gym_member_name' => $this->gym_members->first()->user->name,
            'gym_member_email' => $this->gym_members->first()->user->email,

            'gym_name' => $this->gym->name,
            'city' => $this->gym->city->name
        ];
    }
}
