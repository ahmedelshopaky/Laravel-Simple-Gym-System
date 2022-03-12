<?php

namespace Database\Seeders;

use App\Models\CityManager;
use App\Models\Coach;
use App\Models\Gym;
use App\Models\GymManager;
use App\Models\GymMember;
use App\Models\TrainingPackage;
use App\Models\TrainingSession;
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
        // User::factory(10)->create();
        GymMember::factory(10)->create();
        CityManager::factory(10)->create();
        // Gym::factory(5)->create();
        Coach::factory(5)->create();
        GymManager::factory(5)->create();
        TrainingPackage::factory(10)->create();
        TrainingSession::factory(10)->create();

        $this->call(PermissionsSeeder::class);
    }
}
