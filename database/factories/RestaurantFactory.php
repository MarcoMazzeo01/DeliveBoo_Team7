<?php

namespace Database\Factories;
<<<<<<< HEAD
use App\Models\Restaurant;

use Illuminate\Database\Eloquent\Factories\Factory;
=======

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
>>>>>>> 197ef998f7dfa5c79efeda5b09f7282f577c3c2a

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
<<<<<<< HEAD
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
=======
    public function definition()
    {
        $user = User::all()->pluck('id')->toArray();
        
        return [
            'name'=> fake()->sentence(2),
            'address'=> fake()->address(),
            'description'=> fake()->paragraphs(3, true),
            'image'=> fake()->imageUrl(360, 360, null, true),
            'user_id' => fake()->randomElement($user)
            
>>>>>>> 197ef998f7dfa5c79efeda5b09f7282f577c3c2a
        ];
    }
}