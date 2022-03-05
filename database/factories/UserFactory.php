<?php

namespace Database\Factories;

use Illuminate\Auth\Events\Verified;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $faker = \Faker\Factory::create('ar_EG');

        $gender = $this->faker->randomElement(['male', 'female']);

        return [
            'password' => bcrypt('secret'),
            'avatar_image' => $this->faker->image('public/images/users', 400, 300, null, false),
            'email' => $this->faker->unique()->safeEmail(),
            'name' => $this->faker->name($gender),
            'national_id'=>$faker->nationalIdNumber(),
            'email_verified_at'=>$faker->date(),
            'role' => $faker->randomElement(['city_manager', 'gym_manager', 'gym_member']),
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