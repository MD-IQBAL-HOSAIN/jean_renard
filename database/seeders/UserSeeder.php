<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the users table.
     */
    public function run(): void
    {
        // Add custom admin user
        User::factory()->customAdmin()->create();

        // Add custom regular user
        User::factory()->customUser()->create();
        
        // Add 10 random users
        User::factory()->count(10)->create();
    }
}
