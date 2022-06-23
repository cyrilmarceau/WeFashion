<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('product', AdminProductController::class)->middleware('auth');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('category', AdminCategoryController::class)->middleware('auth');
});


Route::controller(FrontController::class)->group(function() {
    Route::get('/', 'index')->name('product.list')->where(['id' => '[0-9]+']);
    Route::get('produits/{id}', 'getByID')->name('product.show')->where(['id' => '[0-9]+']);
    Route::get('/produits/categorie/{id}', 'getByCategory')->name('product.category')->where(['id' => '[0-9]+']);;
    Route::get('/produits/soldes', 'getBySales')->name('product.sales');
});
