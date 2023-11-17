<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->sentence(mt_rand(3, 7)),
            "user_id" => mt_rand(1, 10),
            "category_id" => mt_rand(1, 5),
            "slug" => fake()->unique()->slug(4),
            "excerpt" => fake()->sentence(mt_rand(7, 15)),
            "body" => collect(fake()->paragraphs(mt_rand(5, 8)))->map(fn ($p) => "<p>$p</p>")->implode("")
        ];
    }
}
