<?php

namespace App\Http\Resources;

use App\Models\CityManager;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'city_id' => $this->id,
            'city_name' => $this->name,
            'gym_name' => $this->gyms->first() ? $this->gyms->first()->name : 'NONE',
            'city_manager_name' => $this->city_manager ? $this->city_manager->user->name : 'NONE',
        ];
    }
}
