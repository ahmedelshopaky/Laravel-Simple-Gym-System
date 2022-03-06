<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiUserAttendanceResource extends JsonResource
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

            'training_session_name' => $this->training_session->name,
            'attendance_date' => date('Y-m-d',strtotime($this->training_session->starts_at)),
            'attendance_time' => [
                'started_at' => date('H:i a',strtotime($this->training_session->starts_at)),
                'finished_at' => date('H:i a',strtotime($this->training_session->finishes_at)),
            ],
            'gym_name' => $this->training_session->gym->name,

        ];
    }
}
