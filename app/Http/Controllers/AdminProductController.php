<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use App\Models\Category;

use App\Services\ProductService;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Requests\ProductRequest;

use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function __construct()
    {
        // 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::getPagination(null, 15);


        return view('admin.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sizes = Size::getAll();
        $categories = Category::getAll();
        
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
    public function store(ProductRequest $productRequest, ProductService $productService)
    {   
        // Create product
        $product = Product::create($productRequest->all());

        // Synchronize sizes
        $product->sizes()->attach($productRequest->sizes);

        // Save picture and set it in local
        if(!empty($productRequest->picture)){
            $link = $productService->setPictureToStore($productRequest->picture);

            $imageName = $productService->getImageName($link);

            $product->picture()->create([
                'link' => $imageName . Str::random(5),
            ]);
        }
        
        // Redirect to admin home page 
        return $productService->redirectToAdminHomePageWithMessage('Le produit a bien été ajouté !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {   
        $sizes = Size::getAll();
        $product = Product::getByID($product->id);
        $categories = Category::getAll();
        
        $checkedSizes = [];

        foreach ($product->sizes as $value) {
            $checkedSizes[] = $value->id;
        }

        return view('admin.product.form', [
            'product' => $product,
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
    public function update(ProductRequest $productRequest, Product $product, ProductService $productService)
    {
        $product = Product::getByID($product->id);

        $product->update($productRequest->all());

        $product->sizes()->sync($productRequest->sizes);

        if(!empty($productRequest->picture)){

            Storage::delete($product->picture->link);
            
            $link = $productService->setPictureToStore($productRequest->picture);

            $imageName = $productService->getImageName($link);

            $product->picture()->update([
                'link' => $imageName,
            ]);
        }
        
        return $productService->redirectToAdminHomePageWithMessage('Le produit a bien été modifié !');

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
