<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    public function dishes()
    {
        return $this->belongsToMany(Dish::class);
    }
    
    public function getOrderDateAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }
    
    protected $dates = ['created_at'];
   public function getOrderTimeAttribute()
   {
       return $this->created_at->format('H:i:s');
   }
}
