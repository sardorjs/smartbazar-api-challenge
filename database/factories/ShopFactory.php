<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Merchant;
use App\Models\Rayon;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    protected $model = Shop::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rayon = Rayon::query()->inRandomOrder()->first();

        return [
            'city_id' => $rayon->city_id,
            'rayon_id' => $rayon->id,
            'merchant_id' => Merchant::factory(),
            'name' => fake()->company(),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'address' => fake()->address(),
            'schedule' => fake()->text(),
            'phone' => fake()->e164PhoneNumber(), //Example output: +14809888523, +12705838722, +13869134701
            'status' => true,
            'registered_at' => now()
        ];
    }
}
