<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurant = new Restaurant();

        $restaurant->name = "la tripolina";
        $restaurant->description = "piatti di carne e di pesce";
        $restaurant->address = 'via fontana morella';
        $restaurant->vat = '1546353531';
        
        $restaurant->save();
    }
}