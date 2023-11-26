<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::factory()->create([
            "name" => "Pendidikan Pancasila",
            "slug" => "pancasila",
            "description" => fake()->sentence(15, false),
            "semester" => 1
        ]);
        Course::factory()->create([
            "name" => "Pendidikan Agama",
            "slug" => "agama",
            "description" => fake()->sentence(15, false),
            "semester" => 1
        ]);
        Course::factory()->create([
            "name" => "Bahasa Inggris",
            "slug" => "bahasa-inggris",
            "description" => fake()->sentence(15, false),
            "semester" => 1
        ]);
        Course::factory()->create([
            "name" => "Matematika Dasar 1",
            "slug" => "matematika-dasar-1",
            "description" => fake()->sentence(15, false),
            "semester" => 1
        ]);
        Course::factory()->create([
            "name" => "Logika Informatika",
            "slug" => "logika-informatika",
            "description" => fake()->sentence(15, false),
            "semester" => 1
        ]);
        Course::factory()->create([
            "name" => "Dasar Pemrograman*",
            "slug" => "dasar-pemrograman",
            "description" => fake()->sentence(15, false),
            "semester" => 1
        ]);
        Course::factory()->create([
            "name" => "Pengantar Teknik Informatika",
            "slug" => "pengantar-teknik-informatika",
            "description" => fake()->sentence(15, false),
            "semester" => 1
        ]);
        Course::factory()->create([
            "name" => "Kewarganegaraan",
            "slug" => "kewarganegaraan",
            "description" => fake()->sentence(15, false),
            "semester" => 2
        ]);
        Course::factory()->create([
            "name" => "Bahasa Indonesia",
            "slug" => "bahasa-indonesia",
            "description" => fake()->sentence(15, false),
            "semester" => 2
        ]);
        Course::factory()->create([
            "name" => "Probabilitas dan Statistik",
            "slug" => "probabilitas-dan-statistik",
            "description" => fake()->sentence(15, false),
            "semester" => 2
        ]);
        Course::factory()->create([
            "name" => "Matematika Dasar 2",
            "slug" => "matematika-dasar-2",
            "description" => fake()->sentence(15, false),
            "semester" => 2
        ]);
        Course::factory()->create([
            "name" => "Organisasi dan Arsitektur Komputer",
            "slug" => "organisasi-dan-arsitektur-komputer",
            "description" => fake()->sentence(15, false),
            "semester" => 2
        ]);
        Course::factory()->create([
            "name" => "Dasar Rekayasa Perangkat Lunak",
            "slug" => "dasar-rekayasa-perangkat-lunak",
            "description" => fake()->sentence(15, false),
            "semester" => 2
        ]);
        Course::factory()->create([
            "name" => "Struktur Data dan Algoritma",
            "slug" => "struktur-data-dan-algoritma",
            "description" => fake()->sentence(15, false),
            "semester" => 2
        ]);
    }
}
