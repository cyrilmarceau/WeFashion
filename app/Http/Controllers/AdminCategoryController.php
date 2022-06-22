<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

use App\Services\CommonService;
use App\Http\Requests\CategoryRequest;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $categories = Category::getAll();
        
        return view('admin.category.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::getAll();
        
        return view('admin.category.form', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * Create new category
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $categoryRequest, CommonService $commonService)
    {
        // dd($categoryRequest->all());
        Category::create($categoryRequest->all());

        return $commonService->redirectToAdminCategoriesWithMessage('La catégorie a bien été rajouté !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
