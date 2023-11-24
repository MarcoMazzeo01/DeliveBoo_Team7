<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;
use App\Models\Restaurant;
use App\Models\Course;
use Faker\Generator as Faker;


class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $restaurants = Restaurant::all()->pluck('id')->toArray();
        $courses = Course::all()->pluck('id')->toArray();

        $dishes = ["Pasta", "Sushi", "Tacos", "Torta", "Acqua"];

        foreach ($dishes as $_dish) {
            
            $restaurant_id = $faker->randomElement($restaurants);
            $course_id = $faker->randomElement($courses);

            $dish = new Dish();
            
            $dish->restaurant_id = $restaurant_id;
            $dish->course_id = $course_id;

            $dish->name = $_dish;
            $dish->description = $faker->paragraphs(3, true);
            $dish->price = $faker->randomfloat(2, 1, 999);
            $dish->visible = $faker->boolean();
            // $dish->image = $faker->imageUrl(360, 360, null, true);

            $dish->save();
        }
    }
}