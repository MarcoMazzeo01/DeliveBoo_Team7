<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }

    public function getTypeBadge(){
        $_types = $this->types()->pluck("name")->toArray();
        $badge = '';
        foreach ($_types as $_typeName) {
            // dd($_typeName);
            $badge .= "<span class='badge' style='background-color: green'>{$_typeName}</span>";
        
        }
        return $badge;
        
    }
}