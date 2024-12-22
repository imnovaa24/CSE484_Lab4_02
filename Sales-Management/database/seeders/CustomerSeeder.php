<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use Faker\Factory as Faker;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $faker = Faker::create();
    for ($i = 1; $i <= 20; $i++) {
        Customer::create([
            'name' => $faker->name,
            'address' => $faker->address,
            'phone' => $faker->phoneNumber,
            'email' => $faker->unique()->safeEmail,
        ]);
    }
}
}
