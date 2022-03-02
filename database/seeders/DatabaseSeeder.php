<?php

namespace Database\Seeders;

use App\Models\CityManager;
use App\Models\Gym;
use App\Models\GymManager;
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
        User::factory(100)->create();
        CityManager::factory(30)->create();
        // Gym::factory(100)->create();
        // GymManager::factory(100)->create();
        
    }
}