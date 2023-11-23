<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
        $user = User::all()->pluck('id')->toArray();

        return [
            'restaurant_name' => fake()->sentence(2),
            'address' => fake()->address(),
            'description' => fake()->paragraphs(3, true),
            'image' => fake()->imageUrl(360, 360, null, true),
            'user_id' => fake()->randomElement($user),
            'vat' => fake()->numerify('IT###########'),

        ];
    }
}