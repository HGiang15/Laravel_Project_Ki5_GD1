<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        // Chũ có dấu cách
        Validator::extend('alpha_spaces', function ($attribute, $value) {
            // return preg_match('/^[A-Za-zÀ-ÿ\s]+$/u', $value);
            return preg_match('/^[\pL\s]+$/u', $value);

        });
    
        Validator::replacer('alpha_spaces', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'The ' . $attribute . ' may only contain letters and spaces.');
        });

        Validator::extend('numeric_spaces', function ($attribute, $value) {
            return preg_match('/^[0-9\s]+$/', $value);
        });
    
        Validator::replacer('numeric_spaces', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'The ' . $attribute . ' must be a number.');
        });
    }
}
