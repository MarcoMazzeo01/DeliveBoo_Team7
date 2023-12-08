<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
