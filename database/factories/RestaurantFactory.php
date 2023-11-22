<?php

namespace Database\Factories;
use App\Models\Restaurant;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Restaurant::class;
    public function definition()
    {
        $name = fake()->name();
        $address = fake()->streetAddress();
        $vat = fake()->name();
        $description = fake()->paragraphs();
        $image = fake()->imageUrl(360,360, 'animals', true);
        $user_id = 1 ;

        return [
            'name' => $name,
            'address' => $address,
            'vat' => $vat,
            'description' => $description,
            'image' => $image,
            'user_id' => $user_id,
        ];
    }
}