<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use HasFactory, SoftDeletes;

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getAbsDescription($chars = 60){

        $_description = $this->description;
        return strlen( $_description) > $chars ? substr($_description, 0, $chars) . '...':  $_description;
    }


    public function getCourseBadge(){

        
       return $badge = "<span class='badge' style='background-color: grey'>{$this->course->name}</span>";
    }


}