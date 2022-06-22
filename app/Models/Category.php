<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'id',
        'created_at',
        'updated_at'
    ];

    use HasFactory;

    public function product(){
        return $this->hasMany(Product::class);
    }
    
    
    /**
     * getAll
     * Get all sizes
     * @return void
     */
    public static function getAll()
    {
        $categories = Category::all();
        return $categories;
    }
    
    /**
     * getById
     * Get category by ID
     * @param  mixed $id
     * @return void
     */
    public static function getById(int $id)
    {
        $category = Category::find($id);
        return $category;
    }
}
