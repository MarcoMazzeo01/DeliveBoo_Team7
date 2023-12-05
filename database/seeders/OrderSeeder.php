<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Faker\Provider\it_IT\Person;
use Faker\Provider\it_IT\PhoneNumber;
// use Faker\Provider\it_IT\Address;
use Faker\Factory;




class OrderSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker, PhoneNumber $phoneNumber) {
        $faker = Factory::create('it_IT');

        for($i = 0; $i < 10; $i++) {

            $order = new Order;
            $order->customer_name = $faker->firstName($gender = 'male' | 'female');
            $order->customer_surname = $faker->lastName();
            $order->customer_phone = $phoneNumber->phoneNumber();
            $order->address = $faker->address();
            $order->notes = '';
            $order->total = $faker->randomFloat(1, 40, 999);
            $order->customer_email = $faker->email();

            $order->save();
        }
    }
}