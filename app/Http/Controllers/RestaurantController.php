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
        $user = auth()->user();
        $restaurant = $user->restaurant;
       
       
    return view("admin.restaurants.index", compact('restaurant'));
    }

    public function show(Restaurant $restaurant)
    {
        
        $restaurantDetail = $restaurant;
        $placeholder = 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/310px-Placeholder_view_vector.svg.png';
        
        return view('admin.restaurants.show', compact('restaurantDetail', 'placeholder'));
    }

}