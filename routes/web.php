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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    #Home
    Route::group(['namespace' => 'HomePage'],
        function () {
            #Home page
            Route::get('/', 'HomeController@index')->name('homepage.index');

            #Register Customer
            Route::get('/register', 'CustomerController@create')->name('homepage.register');
            Route::post('/register', 'CustomerController@store')->name('homepage.register');

            #Login Customer
            Route::get('/login', 'CustomerController@index')->name('homepage.login');
            Route::post('/login', 'CustomerController@checkLogin')->name('homepage.login');
            Route::get('/logout', 'CustomerController@logout')->name('homepage.logout');


            #Cart
            Route::group([
                'prefix' => 'cart',
                'as' => 'cart.',
                'middleware' => 'cus'
            ], function () {
                Route::get('add/{id}/{quantity?}', 'CartController@create')->name('add');
                Route::get('index', 'CartController@index')->name('index');
                Route::get('remove/{id}', 'CartController@remove')->name('remove');
                Route::get('update/{id}/{quantity?}', 'CartController@update')->name('update');

                #Check Out
                Route::get('checkout', 'CheckoutController@index')->name('checkout');
                Route::post('checkout', 'CheckoutController@checkout')->name('checkout');
            });
        });

    #Admin
    Route::group(
        [
            'namespace' => 'Admin', //Đường dẫn có dạng App\Http\Controllers\Admin
            'prefix' => 'admin', //Là tên đường dẫn trên trang web
            'as' => 'admin.'
        ], function () {

        #Login Admin
        Route::get('login', 'LoginController@index')->name('login');
        Route::post('login', 'LoginController@store')->name('login');

        #Function Admin
        Route::group(['middleware' => 'auth'],
            function () {
                Route::get('/dashboard', 'MainController@index')->name('dashboard');
                Route::get('/logout', 'LoginController@logout')->name('logout');

                #Product
                Route::group([
                    'prefix' => 'product',
                    'as' => 'product.',
                ], function () {
                    Route::get('/list', 'ProductController@index')->name('index');
                    Route::get('/add', 'ProductController@create')->name('add');
                    Route::post('/add', 'ProductController@store')->name('add');
                    Route::get('/update-{id}', 'ProductController@edit')->name('edit');
                    Route::post('/update-{id}', 'ProductController@update')->name('edit');
                    Route::get('/delete-{id}', 'ProductController@destroy')->name('delete');
                });

                #Upload
                Route::post('/upload/services', 'UploadController@store');

                #Order
                Route::group([
                    'prefix' => 'customers',
                    'as' => 'customers.',
                ], function () {
                    Route::get('/', 'CartController@index')->name('index');
                    Route::get('/view/{id}', 'CartController@show')->name('show');
                    Route::get('/delete/{id}', 'CartController@destroy')->name('delete');
                });
            }
        );
    });
});





