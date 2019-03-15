<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ProductsApi;

class ProductsApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        app()->singleton(ProductsApi::class, function() {
            return new ProductsApi(env('PRODUCTS_API_KEY'));
        });
    }
}
