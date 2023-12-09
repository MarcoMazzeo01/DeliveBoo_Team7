<?php


use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\OrderGrapichController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Guest\PageController as GuestPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::view('/show-password', 'show-password');

Route::get('/', [GuestPageController::class, 'index'])->name('guest.home');


Route::middleware(['auth', 'verified'])
  ->prefix('admin')
  ->name('admin.')
  ->group(function () {

    Route::get('/', [AdminPageController::class, 'index'])->name('home');

  
    Route::get('/restaurant', [RestaurantController::class, 'index'])->name('restaurant');

    // CRUD dishController
    Route::resource('dish', DishController::class);

    // For orders
    Route::get('/orders-summary',[ OrderController::class, 'index'])->name('orders-summary');

    // controlPannel for User
    Route::get('/order', [OrderGrapichController::class, 'controlPannel'])->name('order');  });


require __DIR__ . '/auth.php';