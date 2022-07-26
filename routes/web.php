<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\ProductController;

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


//Admin
Route::group([
        'namespace' => 'Admin',
        'prefix' => 'admin',
        'name' => 'admin.',
    ],
        function() {
            Route::get('/login',[LoginController::class,'index'])->name('login');
            Route::post('/login',[LoginController::class,'store'])->name('login');
            Route::middleware(['auth'])->group(function (){
                Route::get('/dashboard',[MainController::class,'index'])->name('dashboard');
                Route::get('/logout',[LoginController::class,'logout'])->name('logout');

                #Product
                Route::group([
                    'namespace' => 'Product',
                    'prefix' => 'product',
                    'name' => 'product.',
                ],
                    function() {
                        Route::get('/add',[ProductController::class,'create'])->name('add');
                        Route::post('/add',[ProductController::class,'store'])->name('add');
            });

                #Upload
                Route::post('upload/service',[\App\Http\Services\UploadService::class,'store']);
        });
});
