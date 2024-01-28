<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UI\ProductController as UIProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::redirect('/','/home');
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.layouts.master');
    })->middleware('auth');
    
    Route::get('UI/products', [UIProductController::class, 'index']);
    Route::get('cart', [UIProductController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [UIProductController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('update-cart', [UIProductController::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [UIProductController::class, 'remove'])->name('remove.from.cart');
    Route::post('checkout',[UIProductController::class,'checkout'])->name('checkout')->middleware('auth');
        // Product Routes
        Route::get('/products/index',[ProductController::class,'index']);
        Route::get('/products/create',[ProductController::class,'create']);
        Route::post('/products/store',[ProductController::class,'store']);
        Route::get('/products/{id}/edit',[ProductController::class,'edit']);
        Route::post('/products/update/{id}',[ProductController::class,'update']);
        Route::get('/products/{id}/delete',[ProductController::class,'delete']);

        // Order Routes
        Route::get('/orders/index',[OrderController::class,'index']);
        Route::get('/orders/create',[OrderController::class,'create']);
        Route::post('/orders/store',[OrderController::class,'store']);
        Route::get('/orders/{id}/edit',[OrderController::class,'edit']);
        Route::post('/orders/update/{id}',[OrderController::class,'update']);
        Route::get('/orders/{id}/delete',[OrderController::class,'delete']);

        // Category Routes
        Route::get('/categories/index',[CategoryController::class,'index']);
        Route::get('/categories/create',[CategoryController::class,'create']);
        Route::post('/categories/store',[CategoryController::class,'store']);
        Route::get('/categories/{id}/edit',[CategoryController::class,'edit']);
        Route::post('/categories/update/{id}',[CategoryController::class,'update']);
        Route::get('/categories/{id}/delete',[CategoryController::class,'delete']);

        // Owner Routes
        Route::get('/owner/index',[OwnerController::class,'index']);
        Route::get('/owner/create',[OwnerController::class,'create']);
        Route::post('/owner/store',[OwnerController::class,'store']);
        Route::get('/owner/{id}/edit',[OwnerController::class,'edit']);
        Route::post('/owner/update/{id}',[OwnerController::class,'update']);
        Route::get('/owner/{id}/delete',[OwnerController::class,'delete']);

        //Bill Routes
        Route::get('/bill/index',[BillController::class,'index']);
        Route::get('/bill/create',[BillController::class,'create']);
        Route::post('/bill/store',[BillController::class,'store']);
        Route::get('/bill/{id}/edit',[BillController::class,'edit']);
        Route::post('/bill/update/{id}',[BillController::class,'update']);
        Route::get('/bill/{id}/delete',[BillController::class,'delete']);


        //Shop Routes
        Route::get('/shop/index',[ShopController::class,'index']);
        Route::get('/shop/create',[ShopController::class,'create']);
        Route::post('/shop/store',[ShopController::class,'store']);
        Route::get('/shop/{id}/edit',[ShopController::class,'edit']);
        Route::post('/shop/update/{id}',[ShopController::class,'update']);
        Route::get('/shop/{id}/delete',[ShopController::class,'delete']);


        //SubCategory routes
        Route::get('/sub_category/index',[SubCategoryController::class,'index']);
        Route::get('/sub_category/create',[SubCategoryController::class,'create']);
        Route::post('/sub_category/store',[SubCategoryController::class,'store']);
        Route::get('/sub_category/{id}/edit',[SubCategoryController::class,'edit']);
        Route::post('/sub_category/update/{id}',[SubCategoryController::class,'update']);
        Route::get('/sub_category/{id}/delete',[SubCategoryController::class,'delete']);
        
    });

// Authentication Routes
Auth::routes();

Route::view('/home', 'home')->middleware('auth');

// Other Routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/index',[AdminController::class,'index']);
Route::get('/admin/create',[AdminController::class,'create']);
Route::post('/admin/store',[AdminController::class,'store']);
Route::get('/admin/{id}/edit',[AdminController::class,'edit']);
Route::post('/admin/update/{id}',[AdminController::class,'update']);
Route::get('/admin/{id}/delete',[AdminController::class,'delete']);
