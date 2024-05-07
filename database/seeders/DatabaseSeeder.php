<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $usuarios=\App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '123456789',
        ]);

        $admin=\App\Models\User::factory()->create([
            'name' => 'Test admin',
            'email' => 'test_admin@example.com',
            'password' => '123456789',

        ]);
        $estudiantes=\App\Models\User::factory()->create([
            'name' => 'Test estuduiantes',
            'email' => 'test_estudiantes@example.com',
            'password' => '123456789',
        ]);
        $this->call(RolesSeeder::class);

    }
}
