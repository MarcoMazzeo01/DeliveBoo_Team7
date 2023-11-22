<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     ** @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return view("admin.restaurants.index", compact('restaurants'));
    }

    public function show(Restaurant $restaurant)
    {
        
        $restaurantDetail = $restaurant::select('name', 'address', 'vat', 'description', 'image')->first();
        
        return view('admin.restaurants.show', compact('restaurantDetail'));
    }

}