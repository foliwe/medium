<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
    'title' => fake()->sentence(),
    'content' => fake()->paragraphs(20,true),
    'excerpt' => fake()->sentence(10),
    'user_id' => User::factory(),

    ];
    }
}