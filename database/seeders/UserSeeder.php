<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Seed the users table.
     */
    public function run(): void
    {
      /*   $users = array_map(function ($role) {
            return [
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'password' => Hash::make('11111111'),
                'email_verified_at' => now(),
                'role' => $role,
                'remember_token' => Str::random(10),
            ];
        }, array_merge(
            array_fill(0, 5, 'user'),
            array_fill(0, 5, 'admin')
        ));
        DB::table('users')->insert($users); */

        user::class::factory()->count(10)->create();
    }
}
