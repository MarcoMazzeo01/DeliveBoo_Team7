<?php

namespace App\Http\Controllers;
use App\Models\Dish;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\support\Arr;

use App\Http\Requests\StoreDishRequest;



class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     ** @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        
        $dishes = Dish::where('restaurant_id', '=', $user->restaurant->id)->get();
        
        return view("admin.dishes.index", compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     ** @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dish = Dish::select('name', 'price', 'visible', 'image', 'course_id', 'restaurant_id');
        $courses = Course::select('id','name')->get();      
       
        return view('admin.dishes.create', compact('dish', 'courses'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     ** @return \Illuminate\Http\Response
     */
    public function store(StoreDishRequest $request)
    {
        dd($request);
        $user = auth()->user();
        $_restaurant_id = $user->restaurant->id;
    
        $data = $request->validated();
        $dish = new Dish;

        $dish->name = $data['name'];
        $dish->price = $data['price'];
        $dish->course_id = $data['course_id'];
        $dish->description = $data['description'];
        $dish->restaurant_id =  $_restaurant_id;
        


        if(Arr::exists($data,'visible')){
            $dish->visible = $data['visible'];

        }else{
            $dish->visible = 0;
        }
        
        if(Arr::exists($data,'image')){
            $image_path = Storage::put('uploads/restaurant_id ' . $_restaurant_id . '/dishes', $data['image']);
            $dish->image = $image_path;
        }

        $dish->save();

       return redirect()->route('admin.dish.index')->with('success','dddd');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     ** @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        $dishDetail = $dish;
        
        
        return view('admin.dishes.show', compact('dishDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     ** @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $data = $dish;
       return view('admin.dishes.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     ** @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     ** @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}