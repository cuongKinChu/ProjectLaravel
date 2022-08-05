<?php

namespace App\Providers;

use App\Helper\CartHelper;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();
        view()->composer('*', function ($view) {
            $view->with([
                'cart' => new CartHelper()
            ]);
        });
    }
}
