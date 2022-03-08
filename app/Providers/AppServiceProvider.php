<?php

namespace App\Providers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\MensajeRecibido;

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
        LengthAwarePaginator::defaultView('bootstrap-4');
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
        //$userMail = auth()->user()->email;
        if(Schema::hasTable('mensaje_recibidos')){
            $mailNotificacio = MensajeRecibido::all()->where('estat','actiu')->where('vist', 'no');
            View::share('mailNotificacio', $mailNotificacio);
        }
    }
}
