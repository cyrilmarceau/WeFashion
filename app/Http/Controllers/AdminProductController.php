<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Requests\ProductRequest;

class AdminProductController extends Controller
{
    public function __construct()
    {
        view()->composer('partials.menu', function($view){
            $categories = Category::pluck('people', 'id')->all();
            $view->with('categories', $categories);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(15);

        return view('admin.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sizes = Size::all();
        $categories = Category::all();
        $status = Product::all(['status']);
        
        return view('admin.product.form', [
            'sizes' => $sizes,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $productRequest)
    {   
        // Create product
        $product = Product::create($productRequest->all());

        // Synchronize sizes
        $product->sizes()->attach($productRequest->sizes);

        // Save picture and set it in local
        if(!empty($bookRequest->picture)){
            $link = $productRequest->picture->store('images');
            $imgName = substr($link, strrpos($link, '/') + 1);

            $product->picture()->create([
                'link' => $imgName . Str::random(5),
            ]);
        }
        
        // Redirect to admin home page 
        return redirect()->route('admin.product.index')->with('message', 'Livre ajouté !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {   
        $sizes = Size::all();
        $status = Product::all(['status']);

        $product = Product::find($product->id);
        $categories = Category::all();
        
        $checkedSizes = [];

        foreach ($product->sizes as $value) {
            $checkedSizes[] = $value->id;
        }

        return view('admin.product.form', [
            'product' => $product,
            'status' => $status,
            'sizes' => $sizes,
            'categories' => $categories,
            'checkedSizes' => $checkedSizes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $productRequest, Product $product)
    {
        dd($productRequest->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
