<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\Auth;

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
    
        $orders = Order::where('id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
    
        $ordersDishes = Order::where('id', $user->id)
            ->with('dishes')
            ->get();
    
        return view("admin.orders.ordersSummary", compact('orders', 'ordersDishes'));
    }
    
}
