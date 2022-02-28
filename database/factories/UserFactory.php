<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);

        return [
            'username' => $this->faker->name($gender),
            'password' => bcrypt('secret'),
            'gender' => $gender,
            'profile_image' => $this->faker->image('public/images/users', 400, 300, null, false),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'date_of_birth' => $this->faker->date('Y-m-d', 'now'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
