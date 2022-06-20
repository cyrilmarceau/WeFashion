<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Reverse relation between category and product
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // Reverse relation between size and product
    public function sizes(){
        return $this->belongsToMany(Size::class);
    }

    // Relation between picture and product
    public function picture(){
        return $this->hasOne(Picture::class);
    }
}
