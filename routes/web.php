<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;

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
    function () {
        Route::get('/login', [LoginController::class, 'index'])->name('login');
    });
