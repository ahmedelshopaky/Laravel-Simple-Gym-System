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
            'gym_member' => new GymMemberResource($this->gym_member),
            'gym' => new GymResource($this->gym),
            'training_package' => new TrainingPackageResource($this->training_package),
            'amount_paid' => $this->amount_paid,
        ];
    }
}
