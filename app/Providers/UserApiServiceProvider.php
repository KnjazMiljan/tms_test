<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UserApi;

class UserApiServiceProvider extends ServiceProvider
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
        app()->singleton(UserApi::class, function() {
            return new UserApi(env('USER_API_KEY'));
        });
    }
}
