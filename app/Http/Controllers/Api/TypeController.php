<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $types = Type::select('id', 'name')->get();
        
        return response()->json($types);
    }


    public function show($params){
    //     $prova = [];
        
    //     foreach ($params as $param) {
    //         dump($params);
    //          $prova[] = $param;
             
    //     }
        
    
    // $restaurants = Restaurant::select('restaurants.id','restaurant_name', 'description', 'image', 'address')->whereHas('types', function ($query) use ($params) {
    //     $query->whereIn('types.id', $params);
    // })->with('types:id,name')->get();

    // dd($restaurants);
    // foreach ($restaurants as $restaurant){
    //     $restaurant->image = Storage::url($restaurant->image);
        
    // }
    //    return response()->json($restaurants);
            
        }
    
    }