<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gym>
 */
class GymFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
             'cover_image'=>$this->faker->image('public/images/gyms', 400, 300, null, false),
              'created_at'=>$this->faker->dateTime(now()),
              'updated_at'=>$this->faker->dateTime(now()),
              'name'=>$this->faker->name(), 
              'city'=>$this->faker->city(),
              'city_manager_id'=>User::all('id')->random(),
        ];
    }
}