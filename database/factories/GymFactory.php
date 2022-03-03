<?php

namespace Database\Factories;

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
            'city' => $this->faker->city(),
            // 'city_manager_id'=>CityManager::factory(),
        ];
    }
}
