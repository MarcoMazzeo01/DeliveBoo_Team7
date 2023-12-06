<?php

use App\Http\Controllers\Api\DishController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\Orders\OrderController;



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

Route::apiResource("restaurant", RestaurantController::class)->only(["index", "show"]);
Route::apiResource("type", TypeController::class)->only("index");

// Api ordini
Route::post('order/', [OrderController::class, 'orderDataForm']);
Route::post('order/send', [OrderController::class, 'saveDataForm']);
Route::get('order/generate', [OrderController::class, 'generate']);
Route::post('order/make/payment', [OrderController::class, 'makePayment']);