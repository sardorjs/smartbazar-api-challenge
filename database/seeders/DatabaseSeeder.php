<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\City;
use App\Models\Rayon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Добавление фейковых городов и районов
        City::factory()
            ->count(2)
            ->has(Rayon::factory()->count(4))
            ->create();
    }
}
