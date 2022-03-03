<?php

namespace Database\Seeders;

<<<<<<< HEAD
use App\Models\CityManager;
use App\Models\Gym;
use App\Models\GymManager;
=======
use App\Models\GymMember;
>>>>>>> 25ca4b38e71396546e6c862cadf28a80151ddb86
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
    }
}