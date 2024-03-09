<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Merchant;
use App\Models\Rayon;
use App\Models\Shop;
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
        //Добавление админа
        User::factory([
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin12345'),
        ])->create();

        // Добавление фейковых городов и районов
        City::factory()
            ->count(3)
            ->has(Rayon::factory()->count(8))
            ->create();

        // Добавление Мерчантов с их Магазинами
        Merchant::factory()
            ->count(3)
            ->has(
                Shop::factory()
                ->count(8)
            )
            ->create();
    }
}
