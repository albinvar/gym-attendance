<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // roles seeder
        $this->call(RoleSeeder::class);

        User::factory(10)->create();

        User::factory()->create([
             'name' => 'Test User',
             'email' => 'student1@gmail.com',
             'password' => bcrypt('password'),
        ]);

        // canteen seeder
        User::factory()->create([
            'name' => 'Canteen',
            'email' => 'canteen@gmail.com',
            'password' => bcrypt('password'),
        ]);

        // library seeder
        User::factory()->create([
            'name' => 'Library',
            'email' => 'library@gmail.com',
            'password' => bcrypt('password'),
        ]);

        // store seeder
        User::factory()->create([
            'name' => 'Store',
            'email' => 'store@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
