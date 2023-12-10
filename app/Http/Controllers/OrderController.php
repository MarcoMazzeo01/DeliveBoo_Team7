<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Restaurant;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $restaurant = Restaurant::where('id', $user->id);
    
        $orders = Order::all()
            ->dishes()->where('restaurant_id', $restaurant)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
    
        $ordersDishes = Order::where()
            ->with('dishes')
            ->get();
    
        return view("admin.orders.ordersSummary", compact('orders', 'ordersDishes'));
    }
    
}
