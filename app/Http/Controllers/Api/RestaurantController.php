<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Restaurant;
use App\Models\Dish;
use App\Models\Course;

class RestaurantController extends Controller
{
    public function index(){

        $restaurants = Restaurant::select('restaurants.id','restaurant_name', 'description', 'image', 'address')->with(['types' => function($query){
            $query->select('types.id','name','types.image');
        }])->get();
        
        
        
        
        return response()->json($restaurants);
    }

    public function show($id){
        $dishes = Dish::select('dishes.id', 'dishes.name', 'description', 'price', 'image', 'course_id')->with(['course' => function ($query) {
            $query->select('courses.id','courses.name', 'color'); 
        }])->where('restaurant_id', $id)->where('visible', 1)->get();
    
        return response()->json($dishes);
    }
}