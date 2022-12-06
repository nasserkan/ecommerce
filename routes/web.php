<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test3',
   [App\Http\Controllers\categoryController::class, 'test3'])->name('test3');


Route::get('/test',
   [App\Http\Controllers\categoryController::class, 'test'])->name('test');

Route::get('/test2',
   [App\Http\Controllers\categoryController::class, 'test2']);




Route::get('/testexcel',
   [App\Http\Controllers\categoryController::class, 'testexcel'])->name('testexcel');

Route::get('/allCategory',
   [App\Http\Controllers\categoryController::class, 'index'])->name('allCategory');
Route::get('/addCategory',
   [App\Http\Controllers\categoryController::class, 'add'])->name('addCategory');
Route::post('insert-category',
   [App\Http\Controllers\categoryController::class, 'insert']);

   Route::get('edit-category/{id}',
   [App\Http\Controllers\categoryController::class, 'edit']);

   Route::get('update-category',
   [App\Http\Controllers\categoryController::class, 'update']);

   Route::get('delete-category/{id}',
   [App\Http\Controllers\categoryController::class, 'delete']);

Route::get('/modelCategory',
   [App\Http\Controllers\categoryController::class, 'model'])->name('modelCategory');

   Route::get('/allProducts',
   [App\Http\Controllers\ProductController::class, 'index'])->name('allProducts');

   Route::post('insert-product',
   [App\Http\Controllers\ProductController::class, 'insert']);

   Route::get('edit-product/{id}',
   [App\Http\Controllers\ProductController::class, 'edit']);

   Route::get('update-product',
   [App\Http\Controllers\ProductController::class, 'update']);

   Route::get('delete-product/{id}',
   [App\Http\Controllers\ProductController::class, 'delete']);

   Route::get('show-product/{id}',
   [App\Http\Controllers\ProductController::class, 'show']);

   Route::post('addToCart',
   [App\Http\Controllers\CartController::class, 'addToCart']);

   Route::post('deleteCart',
   [App\Http\Controllers\CartController::class, 'deleteCart']);

   Route::get('viewCart',
   [App\Http\Controllers\CartController::class, 'viewCart']);

   Route::POST('deleteCartItem',
   [App\Http\Controllers\CartController::class, 'deleteCartItem']);

   Route::POST('updateCart',
   [App\Http\Controllers\CartController::class, 'updateCart']);

   Route::get('viewCheckout',
   [App\Http\Controllers\CheckoutController::class, 'viewCheckout']);

   Route::get('viewOrder',
   [App\Http\Controllers\CheckoutController::class, 'viewOrder']);

   Route::get('viewOrderDetails/{id}',
   [App\Http\Controllers\CheckoutController::class, 'viewOrderDetails']);



   Route::post('place-order',
   [App\Http\Controllers\CheckoutController::class, 'placeOrder']);

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    });
});

