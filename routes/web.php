<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


// Auth::routes();
Route::resource('admin', ProductController::class)->middleware('auth');

Route::controller(FrontController::class)->group(function() {
    Route::get('/', 'index')->name('product.list')->where(['id' => '[0-9]+']);;
    // Route::get('/create', 'BookController@create');
    // Route::post('/store', 'BookController@store');
    // Route::get('/{id}/edit', 'BookController@edit');
    // Route::post('/{id}/update', 'BookController@update');
    // Route::get('/{id}/delete', 'BookController@delete');
});