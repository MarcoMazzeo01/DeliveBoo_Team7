<?php

namespace App\Http\Controllers;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     ** @return \Illuminate\Http\Response
     */
    public function show()
    {   
        $user = auth()->user();
        $restaurantDetail = $user->restaurant;
        $placeholder = 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/310px-Placeholder_view_vector.svg.png';
       
        return view("admin.restaurants.restaurant", compact('restaurantDetail', 'placeholder'));
    }


}