<?php

namespace Database\Factories;

use App\Models\Gym;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GymManager>
 */
class GymManagerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(['role' => 'gym_manager']),
            // 'banned_at' => $this->faker->dateTimeThisYear(),
            'gym_id' => Gym::factory(),
        ];
    }
}
