<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //php artisan db:seed --class=AdminSeeder


        User::create([
            'name' => 'admin',
            'email' => 'ahmed@admin.com',
            'password' => Hash::make('123456'),
            'avatar_image' => ' ',
            // 'role_id' => '3',
            'role' => 'admin',
            ])->assignRole('admin');
    }
}
