<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $faker = Faker::create();
    for ($i = 1; $i <= 50; $i++) {
        Product::create([
            'name' => $faker->word,
            'description' => $faker->sentence,
            'price' => $faker->randomFloat(2, 10, 500),
            'quantity' => $faker->numberBetween(1, 100),
        ]);
    }
}

}
