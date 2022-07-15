<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CustomerController;

use App\Http\Controllers\HomeController;

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
Route::get('/', [HomeController::class, 'index'])->name('homepage.index');
Route::group([
    'namespace' => 'Cart',
    'prefix' => 'cart',
    'name' => 'cart.',
], function () {
    Route::get('add/{id}/{quantity?}', [\App\Http\Controllers\CartController::class, 'create'])->name('cart.add');
    Route::get('index', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::get('remove/{id}',[\App\Http\Controllers\CartController::class,'remove'])->name('cart.remove');
    Route::get('update/{id}/{quantity?}',[\App\Http\Controllers\CartController::class,'update'])->name('cart.update');
    Route::post('index',[\App\Http\Controllers\CartController::class,'checkout'])->name('cart.index');
});


//Admin
Route::get('admin/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/login', [LoginController::class, 'store'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function (){
        Route::get('/dashboard', [MainController::class, 'index'])->name('dashboard');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

        #Product
        Route::group(['prefix' => 'product',], function () {
            Route::get('/list', [ProductController::class, 'index'])->name('product.index');
            Route::get('/add', [ProductController::class, 'create'])->name('product.add');
            Route::post('/add', [ProductController::class, 'store'])->name('product.add');
            Route::get('/edit-{id}', [ProductController::class, 'edit'])->name('product.edit');
            Route::post('/edit-{id}', [ProductController::class, 'update'])->name('product.edit');
            Route::get('/delete-{id}', [ProductController::class, 'destroy'])->name('product.delete');
        });

        #Upload
        Route::post('/upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);

        #Cart
        Route::group(['prefix' => 'customers',], function () {
            Route::get('/', [\App\Http\Controllers\Admin\CartController::class, 'index'])->name('customers.index');
            Route::get('/view/{id}', [\App\Http\Controllers\Admin\CartController::class, 'show'])->name('customers.show');
            Route::get('/delete/{id}', [\App\Http\Controllers\Admin\CartController::class, 'destroy'])->name('customers.delete');

        });
    });
});
