<?php

namespace Database\Factories;

use Carbon\Carbon;
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
            'avatar_image' => $this->faker->image('public/images/users', 200, 200, null, false),
            'email' => $this->faker->unique()->safeEmail(),
            'name' => $this->faker->name($gender),
            'national_id' => $faker->nationalIdNumber(),
            // 'email_verified_at'=>$faker->date(),
            'email_verified_at' => Carbon::create(2022, 03, 15, 00, 00, 00)->format('Y-m-d H:i:s'),
            'role' => $faker->randomElement(['city_manager', 'gym_manager', 'gym_member']),
            'created_at' => now(),
            'updated_at' => now(),
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
