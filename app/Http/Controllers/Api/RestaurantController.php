<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Models\Restaurant;
use Illuminate\Http\Request;



class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        
        // / ELIMINARE DOPO TEST ***************/
        // $restaurants = Restaurant::select('restaurants.id','restaurant_name', 'description', 'image', 'address')->with('types:id,name')->get();
        // / ELIMINARE DOPO TEST ***************/
        
        $params = $request->input("Id");

        $restaurants = Restaurant::select('restaurants.id','restaurant_name', 'description', 'image', 'address')->whereHas('types', function ($query) use ($params) {
            $query->whereIn('types.id', $params);
        })->with('types:id,name')->get();
    
        foreach ($restaurants as $restaurant){
            $restaurant->image = Storage::url($restaurant->image);
            
        }
       
        return response()->json($restaurants);
    }



    public function show(){
        
    
   
       return response()->json();
       
    }

    
}
    