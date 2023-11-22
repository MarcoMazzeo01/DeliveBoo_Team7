<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function getAbsDescription($chars = 60){

        $_description = $this->description;
        return strlen( $_description) > $chars ? substr($_description, 0, $chars) . '...':  $_description;
    }
}