<?php

namespace Database\Seeders;

use App\Models\Blog;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\BlogSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Kifaru Wabantu',
            'email' => 'kifaru@example.com',
            'password' => 'password'
        ]);

        User::factory()->create([
        'name' => 'Foliwe Fossung',
        'email' => 'foliwe@example.com',
        'password' => 'password',
        'is_admin' => true
        ]);

        User::factory(2)->create();

        Blog::factory(8)->create();

        // $this->call(BlogSeeder::class)
    }
}