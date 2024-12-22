<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Customer;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $faker = Faker::create();
    $customers = Customer::all();
    foreach ($customers as $customer) {
        for ($i = 1; $i <= rand(1, 5); $i++) {
            Order::create([
                'customer_id' => $customer->id,
                'order_date' => $faker->date,
                'status' => $faker->randomElement(['Pending', 'Completed', 'Cancelled']),
            ]);
        }
    }
}
}
