<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            "name" => "Phasya Ananta",
            "username" => "erikaaaa",
            "email" => "phasya@gmail.com",
            "password" => Hash::make("rahasia"),
            "is_admin" => 1
        ]);
    }
}
