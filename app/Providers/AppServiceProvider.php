<?php

namespace App\Providers;

use App\Listw;
use App\Role;
use App\Act;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Schema::defaultStringLength(191); //Solved by increasing StringLength

         view()->composer('*',function($view){
             $view->with('mwing', Listw::all());
         });

         view()->composer('*',function($view){
             $view->with('role', role::all());
         });

         view()->composer('*',function($view){
             $view->with('act', act::all());
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
