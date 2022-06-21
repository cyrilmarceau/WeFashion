<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function __construct()
    {
        view()->composer('partials.front-menu', function($view){
            $categories = Category::pluck('name', 'id')->all();
            $view->with('categories', $categories);
        });
    }


    /**
     * index
     * List product, paginate it and return it in a view
     * @return void
     */
    public function index()
    {
        // Get product published
        $products = Product::getAllPublished();
        
        // get pagination associate to product
        $productsPaginate = Product::getPagination($products, 6);
        
        // Get product count
        $productCount = $this->getAllCountProduct($products);

        return view('front.index', ['products' => $productsPaginate, 'count' => $productCount]);
    }


    public function getByCategory(int $id)
    {   
        $products = Product::getByCategoryId($id);
        $productsPaginate = Product::getPagination($products, 6);
        $productCount = $this->getAllCountProduct($products);

        $category = Category::getByID($id);
        
        return view('front.category', [
            'products' => $productsPaginate,
            'category' => $category,
            'count' => $productCount
        ]);
    }

        
    /**
     * getByID
     * Get product by ID and return it in a view
     * @param  mixed $id
     * @return void
     */
    public function getByID(int $id)
    {
        
        $product = Product::getByID($id);
        
        return view(
            'front.product', 
            ['product' => $product]
        );
    }

    /**
     * getBySales
     * get product on sale and return it in a view
     * @return void
     */
    public function getBySales()
    {
        $products = Product::getByStatusOnSale();
        $productsPaginate = Product::getPagination($products, 6);
        $productCount = $this->getAllCountProduct($products);

        return view(
            'front.sales', 
            [
            'products' => $productsPaginate,
            'count' => $productCount]
        );
    }

    /**
     * getAllCountProduct
     * Count product collection
     * @return int
     */
    public function getAllCountProduct($products): int
    {
        $countProduct = $products->count();

        return $countProduct;
    }
}
