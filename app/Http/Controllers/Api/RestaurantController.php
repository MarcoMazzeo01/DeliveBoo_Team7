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

                $placeholder = 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/310px-Placeholder_view_vector.svg.png';
                if($restaurant->image ) {
                    $restaurant->image = Storage::url($restaurant->image);
                   } else {
                    $restaurant->image = $placeholder;
                   }

            }
        }


        $params = $request->input("params"); // salvo i parametr in params


        if (!empty($params)) { //verifico se sono stati passati parametri


            if (is_array($params)) { //se è un array restituisco secondo le checkbox checked

                $restaurants = Restaurant::select('restaurants.id', 'restaurant_name', 'description', 'image', 'address')->whereHas('types', function ($query) use ($params) {
                    $query->whereIn('types.id', $params);
                },  '=', count($params))->with('types:id,name')->get();

                imagePath($restaurants);
            } else { // altrimenti è una stringa


                $restaurants = Restaurant::select('restaurants.id', 'restaurant_name', 'description', 'image', 'address')->whereRaw('LOWER(REPLACE(restaurant_name, " ", "")) LIKE ?', ['%' . $params . '%'])->with('types:id,name')->get();

                imagePath($restaurants);
            }
        } else { // se assenza params restituisco i ristoranti in ordine di creazione          

            $restaurants = Restaurant::select('restaurants.id', 'restaurant_name', 'description', 'image', 'address')->with('types:id,name')->orderBy('created_at', 'desc')->limit(3)->get();
           
            imagePath($restaurants);
        }
        return response()->json($restaurants);
    }

    public function show($id)
    {
        
        $restaurant = Restaurant::select('restaurants.id', 'restaurant_name', 'description', 'image', 'address')->where('id', $id)->with('types:id,name')->first();
        $dishes = Dish::select('id', 'name', 'image', 'description', 'price', 'course_id', 'restaurant_id')->where('restaurant_id', $id)->where('visible', '=', '1')->with('course:id,name,color')->get();
        
        
        $placeholder = 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/310px-Placeholder_view_vector.svg.png';

        if($restaurant->image ) {
         $restaurant->image = Storage::url($restaurant->image);
        } else {
         $restaurant->image = $placeholder;
        }


        foreach ($dishes as $dish) {
            $placeholder = 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/310px-Placeholder_view_vector.svg.png';

            if($dish->image ) {
             $dish->image = Storage::url($dish->image);
            } else {
             $dish->image = $placeholder;
            }
        }

        return response()->json(['restaurant' => $restaurant, 'dishes' => $dishes]);
    }
}