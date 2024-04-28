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
            'name' => 'Trainer',
            'email' => 'trainer@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $u1->assignRole('trainer');

        // library seeder
        $u2 = User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        // assign role
        $u2->assignRole('admin');
    }
}
