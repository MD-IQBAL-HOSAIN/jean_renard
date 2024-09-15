<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{    
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('11111111'),
            'remember_token' => Str::random(10),
            'role' => $this->faker->randomElement(['user', 'admin']), 
        ];
    }

    // Custom admin user factory state
    public function customAdmin(): static
    {
        return $this->state([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('11111111'),
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);
    }

    // Custom regular user factory state
    public function customUser(): static
    {
        return $this->state([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('11111111'), 
            'role' => 'user',
            'remember_token' => Str::random(10),
        ]);
    }
}
