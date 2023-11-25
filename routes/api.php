<?php

use App\Http\Controllers\Api\RestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Models\Dish;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("restaurant", RestaurantController::class)->only(["index","show"]);

// Route::get('/restaurant/{id}/dishes', function ($id) {

   
//     $dishes = Dish::where('restaurant_id', $id)->where('visible', 1)->get();
    

//     return response()->json($dishes);
// });