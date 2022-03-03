<?php

namespace Database\Seeders;

use App\Models\CityManager;
use App\Models\Coach;
use App\Models\Gym;
use App\Models\GymManager;
use App\Models\GymMember;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $numberOfUsers=300;
        // User::factory(10)->create();
        GymMember::factory($numberOfUsers*0.20)->create();
        GymManager::factory($numberOfUsers*0.30)->create();
        CityManager::factory($numberOfUsers*0.20)->create();
        // Gym::factory(5)->create();
        Coach::factory($numberOfUsers*0.20)->create();
    }
}