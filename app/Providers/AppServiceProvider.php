<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Role;
use Blade;
use View;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer(['*'], function($view)
        {
            $user = Auth::user();
            $view->with('user', $user);
        });

        Blade::if('admin', function()
        {
            $user = Auth::user();
            $admin = Role::where('user_id', $user->id)->first();

            return $admin;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
