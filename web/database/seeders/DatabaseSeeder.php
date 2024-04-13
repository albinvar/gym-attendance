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

        $student = User::factory()->create([
             'name' => 'Test User',
             'email' => 'student1@gmail.com',
             'password' => bcrypt('password'),
        ]);

        $student->assignRole('user');

        // canteen seeder
        $u1 = User::factory()->create([
            'name' => 'Canteen',
            'email' => 'canteen@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $u1->assignRole('campus entity');

        // library seeder
        $u2 = User::factory()->create([
            'name' => 'Library',
            'email' => 'library@gmail.com',
            'password' => bcrypt('password'),
        ]);
        // assign role
        $u2->assignRole('campus entity');

        // store seeder
        $u3 = User::factory()->create([
            'name' => 'Store',
            'email' => 'store@gmail.com',
            'password' => bcrypt('password'),
        ]);
        // assign role
        $u3->assignRole('campus entity');
    }
}
