<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as faker;

use App\Models\Dish;
use Illuminate\Support\Arr;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
       $dishes = Dish::all();

       $_courses = ['Antipasto', 'Primo', 'Secondo', 'Contorni', 'Bibite',];

       foreach($_courses as $_course) {
        $course = new Course();
        $course->name = $_course;
        $course->color = $faker->hexColor();

        $course->save();

       }
    }
}

