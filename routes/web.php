<?php

use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\DishController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [GuestPageController::class, 'index'])->name('guest.home');


Route::middleware(['auth', 'verified'])
  ->prefix('admin')
  ->name('admin.')
  ->group(function () {

    Route::get('/', [AdminPageController::class, 'index'])->name('home');

    // CRUD restaurantController
    Route::resource('restaurant', RestaurantController::class)->only(['index', 'show']);

  // CRUD dishController
    Route::resource('dish', DishController::class);
  });

require __DIR__ . '/auth.php';