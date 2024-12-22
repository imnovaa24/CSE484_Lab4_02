<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Product;
use Faker\Factory as Faker;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $faker = Faker::create();
    $orders = Order::all();
    $products = Product::all();

    foreach ($orders as $order) {
        for ($i = 1; $i <= rand(1, 5); $i++) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $products->random()->id,
                'quantity' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
}
