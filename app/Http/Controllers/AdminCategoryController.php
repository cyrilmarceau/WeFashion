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
        $categories = Category::getAll();

        return view('admin.category.form', [
            'categories' => $categories,
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $categoryRequest, Category $category, CommonService $commonService)
    {

        $category->update($categoryRequest->all());

        return $commonService->redirectToAdminCategoriesWithMessage('La catégorie a bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, CommonService $commonService)
    {   
        $category->product()->update(['category_id' => null]);
        $category->delete();

       return $commonService->redirectToAdminCategoriesWithMessage('La catégorie a bien été supprimé !');
    }
}
