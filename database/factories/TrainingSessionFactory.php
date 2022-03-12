<?php

namespace Database\Factories;

use App\Models\Gym;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TrainingSession>
 */
class TrainingSessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $hour = rand(00, 23);
        $minute = rand(00, 59);
        $second = rand(00, 59);
        $year = 2022;
        $month = 03;
        $day = rand(1, 31);

        $date = Carbon::create($year, $month, $day, $hour, $minute, $second);

        return [
            'name' => $this->faker->name,
            'starts_at' => $date->format('Y-m-d H:i:s'),
            'finishes_at' => $date->addHours(rand(1, 3))->format('Y-m-d H:i:s'),
            // 'gym_id' => Gym::factory(),
            'gym_id' => $this->faker->unique()->numberBetween(1, 10),
        ];
    }
}
