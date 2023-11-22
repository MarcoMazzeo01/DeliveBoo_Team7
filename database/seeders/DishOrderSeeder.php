<?php

namespace Database\Seeders;
use Faker\Generator as Faker;
use App\Models\Dish;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $dishes = Dish::all();
        $orders = Order::all();

        foreach($dishes as $dish) {
            $quantity = $faker->randomDigit();
            $randomOrders = $orders->random(rand(1, 5));

            foreach ($randomOrders as $randomOrder) {
                $dish->orders()->attach($randomOrder, ['quantity' => $quantity]);
            }
          }


    }
}
