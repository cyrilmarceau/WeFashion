<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function __construct()
    {
        view()->composer('partials.menu', function($view){
            
            $genres = Product::pluck('name', 'id')->all();
            $view->with('genres', $genres);
        });
    }

    public function index() {

        $products = Product::paginate(6);

        return view('front.index', ['products' => $products]);
    }
}
