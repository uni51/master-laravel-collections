<?php

namespace App\Providers;

use Illuminate\Support\Collection;
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
        Collection::macro('even', function(){
            return $this->filter(function($val){
                return $val % 2 === 0;
            })->values();
        });

        Collection::macro('divedBy', function($num){
            return $this->filter(function($val) use ($num) {
                return $val % $num === 0;
            })->values();
        });

        Collection::macro('notDivedBy', function($num){
            return $this->reject(function($val) use ($num) {
                return $val % $num === 0;
            })->values();
        });
    }
}
