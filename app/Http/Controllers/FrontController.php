<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function __construct()
    {
        view()->composer('partials.menu', function($view){
            $categories = Category::pluck('people', 'id')->all();
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

        $products = Product::paginate(6);
        $productCount = $this->getAllCountProduct($products);

        return view('front.index', ['products' => $products, 'count' => $productCount]);
    }


    public function getByCategory(int $id)
    {   
        $products = Product::where('category_id', $id)->get();
        $productCount = $this->getAllCountProduct($products);

        $category = Category::find($id);
        
        return view('front.category', [
            'products' => $products,
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
        
        $product = Product::find($id);
        
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
        $products = Product::where('status', 'on_sale')->get();
        $productCount = $this->getAllCountProduct($products);

        return view(
            'front.sales', 
            [
            'products' => $products,
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
