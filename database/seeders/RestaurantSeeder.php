<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for ($i = 0; $i < 5; $i++) {
            $restaurant = new Restaurant();
            $restaurant->name = $faker->sentence(2);
            $restaurant->address = $faker->address();
            $restaurant->description = $faker->paragraphs(3, true);
            $restaurant->image = $faker->imageUrl(360, 360, null, true);
            $restaurant->user_id = 1;
            $restaurant->save();
        }
    }
}