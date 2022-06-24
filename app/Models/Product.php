<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'status',
        'visibility',
        'reference',
        'updated_at'
    ];

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

        
    
    /**
     * index
     * Get a list of all products
     * @return void
     */
    public static function getAll()
    {
        $products = Product::all();
        return $products;
    }

    /**
     * getByID
     * Get product by his ID
     * @param  mixed $id
     * @return object
     */
    public static function getByID(int $id): object
    {
        $product = Product::find($id);
        return $product;
    }


    public static function getByCategoryId($id)
    {
        $productsPublished = self::getByVisibilityPublished();

        $products = $productsPublished->where('category_id', $id);

        return $products;
    }

    /**
     * getByVisibilityPublished
     * Get product published
     * @return object
     */
    public static function getByVisibilityPublished()
    {
        $products = Product::orderBy('created_at', 'desc')->where('visibility', 'published');
        return $products;
    }

    /**
     * getByStatusOnSale
     * Get product published
     * @return void
     */
    public static function getByStatusOnSale()
    {
        $productsPublished = self::getByVisibilityPublished();

        $products = $productsPublished->where('status', 'on_sale');
        
        return $products;
    }

        
    /**
     * getPagination
     * Get pagination associate to products list
     * @param  mixed $products
     * @param  mixed $pagination
     * @return void
     */
    protected static function getPagination($products = null, int $pagination = 6)
    {
       
        if($products === null) {
            // return Product::paginate($pagination);
            return Product::orderBy('created_at', 'desc')->paginate($pagination);
        }

        $productsPaginate = $products->orderBy('created_at', 'desc')->paginate($pagination);

        return $productsPaginate;
    }


}
