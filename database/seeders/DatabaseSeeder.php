<?php

namespace Database\Seeders;

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
    }
}