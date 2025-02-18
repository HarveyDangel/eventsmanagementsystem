<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Harv',
            'email' => 'harv@email.com',
            'password' => '12345678',
            'is_admin' => '0',
        ]);
        
        User::factory()->create([
            'name' => 'Haz',
            'email' => 'haz@email.com',
            'password' => '12345678',
            'is_admin' => '1',
        ]);
    }
}
