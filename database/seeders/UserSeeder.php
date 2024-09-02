<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate 800 unverified users
        User::factory()->count(800)->create();

        // Generate 200 verified users
        User::factory()->count(200)->verified()->create();
    }
}
