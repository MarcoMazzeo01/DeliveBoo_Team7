<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Dish;


class OrderGrapichController extends Controller
{
    public function controlPannel(){
        

        return view("admin.restaurants.statistics-graph", 
        // compact()
    );

    }
}