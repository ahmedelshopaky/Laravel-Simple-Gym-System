<?php

namespace Database\Seeders;

use App\Models\CityManager;
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
        // User::factory(10)->create(); //محدش يشيل الكومنت .. آمين؟!
        GymMember::factory(10)->create();
        GymManager::factory(10)->create();
        CityManager::factory(10)->create();
        Gym::factory(5)->create();

        // GymMember::factory()
        //     ->count(10)
        //     ->for(User::factory()->state([
        //         'role' => 'gymMember',
        //     ]))
        //     ->create();


        // GymManager::factory()
        //     ->count(10)
        //     ->for(User::factory()->state([
        //         'role' => 'gymManager',
        //     ]))
        //     ->create();

        // CityManager::factory()
        //     ->count(10)
        //     ->for(User::factory()->state([
        //         'role' => 'cityManager',
        //     ]))
        //     ->create();
    }
}
