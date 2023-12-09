<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Order extends Model
{
    use HasFactory;
    
    public function dishes()
    {
        return $this->belongsToMany(Dish::class)->withPivot('quantity');
    }
    
    protected $dates = ['created_at'];
    public function getOrderDate()
    {
        return $this->created_at->format('d/m/Y');
    }
    
   public function getOrderTime()
   {
       return $this->created_at->format('H:i:s');
   }

   public function orderReceived(Order $order) {

    $mail_order_received = new OrderReceived($order);

    //invio al ristoratore
    $user = Auth::user();
    Mail::to($user->email)->send($mail_order_received);

    //invio all'utente
    // Mail::to($order->customer_email)->send($mail_order_received);

    return redirect()->back();
   }
}
