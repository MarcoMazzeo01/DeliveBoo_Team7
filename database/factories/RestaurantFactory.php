<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Restaurant;
use Faker\Factory as FakerFactory;

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
        $faker = FakerFactory::create('it_IT');

        $restaurantTypes = ['Ristorante', 'Trattoria', 'Osteria', 'Pizzeria', 'Enoteca', 'Taverna', 'Pub'];
        $restaurantNames = ['Nonna Aurora', 'del Borgo', 'Antichi Sapori Siciliani', 'Carbo', 'Dream Bio', 'sul Brenta', 'Veg'];
        $restaurantDescription = [
            'Il luogo perfetto per gustare autentici piatti italiani.',
            'Ambiente accogliente e piatti della tradizione da non perdere.',
            'Un mix perfetto di sapori italiani in ogni portata.',
            'Esperienza culinaria unica in un ambiente tipicamente italiano.',
            'Menu ricco di specialità della cucina italiana.',
            'Passione e gusto si incontrano in ogni piatto servito.',
            'Autentica cucina italiana con ingredienti freschi e genuini.',
            'Specialità regionali italiane preparate con passione e maestria.',
            'Menu vario e ricco di sapori mediterranei, autentici e deliziosi.',
        ];

        return [
            'restaurant_name' => $faker->randomElement($restaurantTypes) . " " . $faker->randomElement($restaurantNames),
            'address' => $faker->address,
            'description' => $faker->randomElement($restaurantDescription),
            'image' => fake()->imageUrl(360, 360, null, true),
            'user_id' => fake()->randomElement($user),
            'vat' => fake()->numerify('IT###########'),

        ];
    }
}