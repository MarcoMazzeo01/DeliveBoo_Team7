<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * return \Illuminate\Http\Response
     */
    public function index($restaurantId)
    {

        $dishes = Dish::select('id', 'name', 'description', 'image', 'price', 'visible', 'course_id', 'restaurant_id')
        ->with('course:id,name', 'restaurant:id')
        ->where('restaurant_id', $restaurantId)        
        ->get();

    // if ($dishes) {
    //     $dishes->image = Storage::url($dishes->image);
    // }

    return response()->json($dishes);

    }

    /**
     * Store a newly created resource in storage.
     *
     * param  \Illuminate\Http\Request  $request
     * return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * param  int  $id
     * return \Illuminate\Http\Response
     */
    public function show()
    {

        $dishes = Dish::select('id', 'name', 'description', 'image', 'price', 'visible', 'course_id', 'restaurant_id')
        ->with('course:id,name', 'restaurant:id')
        ->get();

        if ($dishes) {
            $dishes->image = Storage::url($dishes->image);
        }

        return response()->json($dishes);
    }

    /**
     * Update the specified resource in storage.
     *
     * param  \Illuminate\Http\Request  $request
     * param  int  $id
     * return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * param  int  $id
     * return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
