<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\CityManager;
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
            'cover_image' => $this->faker->image('public/images/users', 800, 300, null, false),
            'name' => $this->faker->sentence(2),
            // 'city_manager_id'=>random_int(11,20),   // must be unique
            'city_manager_id'=>$this->faker->unique()->numberBetween(11, 20),
            'city_id'=>City::factory(),
        ];
    }
}
