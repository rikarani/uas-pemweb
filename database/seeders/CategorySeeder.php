<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use \App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create([
            "name" => "Kucing",
            "slug" => "cat"
        ]);

        Category::factory()->create([
            "name" => "Makanan",
            "slug" => "food"
        ]);

        Category::factory()->create([
            "name" => "Web Programming",
            "slug" => "web-programming"
        ]);

        Category::factory()->create([
            "name" => "Kuliah",
            "slug" => "college"
        ]);

        Category::factory()->create([
            "name" => "Game Permainan",
            "slug" => "game"
        ]);
    }
}
