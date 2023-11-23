<?php

namespace Database\Seeders;

<<<<<<< HEAD
use  App\Models\Restaurant;
use Database\Factories\RestaurantFactory;
=======
use App\Models\Restaurant;
>>>>>>> 197ef998f7dfa5c79efeda5b09f7282f577c3c2a
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class RestaurantSeeder extends Seeder
{
    /**
     ** Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

<<<<<<< HEAD
        $restaurant = RestaurantFactory::factory()->count(5)->create();
        
    }
} 
=======
        // for ($i = 0; $i < 5; $i++) {
        //     $restaurant = new Restaurant();
        //     $restaurant->name = $faker->sentence(2);
        //     $restaurant->address = $faker->address();
        //     $restaurant->description = $faker->paragraphs(3, true);
        //     $restaurant->image = $faker->imageUrl(360, 360, null, true);
        //     $restaurant->user_id = 1;
        //     $restaurant->save();
        // }
        $restaurant = Restaurant::factory(5)->create();
    }
}
>>>>>>> 197ef998f7dfa5c79efeda5b09f7282f577c3c2a
