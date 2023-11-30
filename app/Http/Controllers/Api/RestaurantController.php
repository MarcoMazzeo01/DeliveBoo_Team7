<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

use App\Models\Restaurant;
use App\Models\Dish;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // function per la generazione di path assoluti delle immagini

    public function index(Request $request)
    {

        function imagePath($restaurants)
        {
            foreach ($restaurants as $restaurant) {

                $restaurant->image = Storage::url($restaurant->image);
            }
        }


        $params = $request->input("filter"); // salvo i parametr in params


        if (!empty($params)) { //verifico se sono stati passati parametri


            if (is_array($params)) { //se è un array restituisco secondo le checkbox checked

                $restaurants = Restaurant::select('restaurants.id', 'restaurant_name', 'description', 'image', 'address')->whereHas('types', function ($query) use ($params) {
                    $query->whereIn('types.id', $params);
                })->with('types:id,name')->get();

                imagePath($restaurants);
            } else { // altrimenti è una stringa


                $restaurants = Restaurant::select('restaurants.id', 'restaurant_name', 'description', 'image', 'address')->whereRaw('LOWER(REPLACE(restaurant_name, " ", "")) LIKE ?', ['%' . $params . '%'])->with('types:id,name')->get();

                imagePath($restaurants);
            }
        } else { // se assenza params restituisco tutti i ristoranti 


            $restaurants = Restaurant::select('restaurants.id', 'restaurant_name', 'description', 'image', 'address')->with('types:id,name')->get();



            imagePath($restaurants);
        }


        return response()->json($restaurants);
    }

    public function show($id)
    {

        $restaurant = Restaurant::select('restaurants.id', 'restaurant_name', 'description', 'image', 'address')->where('id', $id)->with('types:id,name')->first();
        $dishes = Dish::select('id', 'name', 'image', 'description', 'price', 'course_id', 'restaurant_id')->where('restaurant_id', $id)->where('visible', '=', '1')->with('course:id,name,color')->get();


        $restaurant->image = Storage::url($restaurant->image);

        foreach ($dishes as $dish) {
            $dish->image = Storage::url($dish->image);
        }

        return response()->json(['restaurant' => $restaurant, 'dishes' => $dishes]);
    }
}
