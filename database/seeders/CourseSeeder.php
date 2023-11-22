<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as faker;

use App\Models\Dish;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $dishes = Dish::all()->pluckId()->toArray();

        $_courses = ["antipasto", "primo", "secondo", "dolce"];

        foreach($_courses as $_course) {

            $dish_id = $faker->randomElement($dishes);

            $course = new Course();

            $course->dish_id = $dish_id;
            $course->name = $_course;
            $course->color = $faker->hexColor();
            $course->save();
        }
    }
}
