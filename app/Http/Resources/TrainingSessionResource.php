<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrainingSessionResource extends JsonResource
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
            'name' => $this->name,
            'time' => $this->starts_at . ' / ' . $this->finishes_at,
            'gym_name' => $this->gym->name,

            'starts_at' => $this->starts_at,
            'finishes_at' => $this->finishes_at,
            'gym' => $this->gym,
        ];
    }
}
