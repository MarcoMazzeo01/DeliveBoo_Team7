<?php

namespace Database\Factories;

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
    public function definition()
    {
        $name = fake()->name();
        $address = fake()->streetAddress();
        $vat = fake()->randomNumber(11, true);
        $description = fake()->paragraphs();
        $image = fake()->imageUrl(360,360, 'animals', true);

        return [
            'name' => $name,
            'address' => $address,
            'vat' => $vat,
            'description' => $description,
            'image' => $image
        ];
    }
}