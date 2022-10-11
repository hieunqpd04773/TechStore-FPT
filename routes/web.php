<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CateItemController;
use Illuminate\Support\Facades\Auth;


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


Route::get('/cart', function () {
    return view('client/cart');
});
Route::prefix('/')->group(function () {
    Route::get('/',[ClientController::class,'index'] )->name('index');
    Route::get('/category/{id}',[ClientController::class,'getProByCate'])->name('getProByCate');
    Route::get('/cateitem/{id}',[ClientController::class,'getProByCateItem'])->name('getProByCateItem');
    Route::post('/getcateitem/{id}',[ClientController::class,'getCateItemByCate'])->name('getCateItemByCate');
    Route::get('product/{id}',[ClientController::class,'getProById'])->name('getProById');
    Route::get('contact',[ClientController::class,'contact'] )->name('contact');
});
Route::get('/checkout', function () {
    return view('client/checkout');
});

Route::get('/single-blog', function () {
    return view('client/single-blog');
});
Route::get('/single-product', function () {
    return view('client/product');
});
Route::get('/tracking', function () {
    return view('client/tracking');
});
Route::get('cateItems',[ProductController::class,'loadCateItem'])->name('CateItems');

//Seach
Route::get('/search',[ClientController::class,'search'] )->name('search');

Route::post('/product/comment/{id}',[ClientController::class,'store'])->name('store');

// admin
Route::prefix('admin')->middleware('checkAdmin')->group(function () {
    Route::prefix('products')->group(function () {
        Route::get('index',[ProductController::class,'index'])->name('listPro');
        Route::get('create',[ProductController::class,'createView'])->name('loadCreatePro');
        Route::post('cateItems',[ProductController::class,'loadCateItem'])->name('loadCateItems');
        Route::post('create',[ProductController::class,'create'])->name('createPro');
        Route::get('delete/{id}',[ProductController::class,'delete'])->name('deletePro');
        Route::get('edit/{id}',[ProductController::class,'loadEdit'])->name('loadEditPro');
        Route::post('edit',[ProductController::class,'edit'])->name('editPro');
    }); 
    Route::prefix('categories')->group(function () {
        Route::get('index', [CategoryController::class,'index'])->name('listCate');
        Route::post('create',[CategoryController::class,'create'])->name('createCate');
        Route::get('edit/{id}',[CategoryController::class,'loadEdit'])->name('loadEditCate');
        Route::post('edit', [CategoryController::class,'edit'])->name('editCate');
        Route::get('delete/{id}', [CategoryController::class,'delete'])->name('deleteCate');
    });
    Route::prefix('cateitems')->group(function () {
        Route::get('index/{id}',[CateItemController::class,'index'])->name('getCateItems');
        Route::post('create', [CateItemController::class,'create'])->name('createCateItem');
        Route::get('delete/{id}', [CateItemController::class,'delete'])->name('deleteCateItem');
        Route::get('edit/{id}',[CateItemController::class,'loadEdit'])->name('loadEditCateItem');
        Route::post('edit', [CateItemController::class,'edit'])->name('editCateItem');
    });
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
