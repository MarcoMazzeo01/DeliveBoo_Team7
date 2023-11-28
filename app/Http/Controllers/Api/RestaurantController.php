<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Models\Restaurant;
use App\Models\Dish;



class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $restaurants = Restaurant::select('restaurants.id','restaurant_name', 'description', 'image', 'address')->with('types:id,name')->get();
        
        foreach ($restaurants as $restaurant){
            $restaurant->image = Storage::url($restaurant->image);
            
        }
        
        return response()->json($restaurants);
    }

    public function show(){

    

       
    }

    
}
    


// $dishes = Dish::select('dishes.id', 'dishes.name', 'description', 'price', 'image', 'course_id')->with('course:id,name,color')->where('restaurant_id', $id)->where('visible', 1)->get();
        
// foreach($dishes as $dish){
//     $dish->description =  $dish->getAbsDescription();
//     dump($dish->image);
//     $dish->image = Storage::url($dish->image);
// return response()->json($dishes);