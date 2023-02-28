<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;

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
        Paginator::useBootstrap();    ///aqui referencie o bootstrap para o paginator

        //criando macros

        Http::macro('employees',function(){
            return Http::withHeaders([
                'Accept' => 'application/json',
            ])->baseUrl('https://dummy.restapiexample.com');
        }); 
    }
}
