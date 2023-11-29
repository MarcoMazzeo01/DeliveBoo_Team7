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
    public function index(Request $request){
        
        if($request->input('id')){
        
        $params = $request->input("id");

        $restaurants = Restaurant::select('restaurants.id','restaurant_name', 'description', 'image', 'address')->whereHas('types', function ($query) use ($params) {
            $query->whereIn('types.id', $params);
        })->with('types:id,name')->get();

        }else{

            $restaurants = Restaurant::select('restaurants.id','restaurant_name', 'description', 'image', 'address')->with('types:id,name')->get();
        }

        foreach ($restaurants as $restaurant){
            
            $restaurant->image = Storage::url($restaurant->image);
        }   
       
        return response()->json($restaurants);
    }

    public function show($id){
        
        $restaurant = Restaurant::select('restaurants.id','restaurant_name', 'description', 'image', 'address')->where('id', $id)->with('types:id,name')->first();
        $dishes = Dish::select('id','name','image','description','price','course_id')->where('restaurant_id',$id)->where('visible', '=', '1')->with('course:id,name,color')->get() ;
        

        $restaurant->image = Storage::url($restaurant->image);

        foreach ($dishes as $dish){
            $dish->image = Storage::url($dish->image);
        } 

       dd($dishes);
       return response()->json(['restaurant'=> $restaurant, 'dishes' => $dishes]);
    }  
}
 