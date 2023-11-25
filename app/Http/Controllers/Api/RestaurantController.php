<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Restaurant;
use App\Models\Dish;

class RestaurantController extends Controller
{
    public function index(){

        $restaurants = Restaurant::select('id','restaurant_name', 'description', 'image', 'address',)->get();
        
        return response()->json($restaurants);
    }

    public function show(Restaurant $restaurant){
        $restaurant = Restaurant::select('id','restaurant_name', 'description', 'image', 'address',)->where('id', $restaurant->id)->first();
    return response()->json($restaurant);
    }
}