<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
    
        Password::defaults(function () {
            return Password::min(8)
                ->mixedCase()   // al menos 1 mayúscula y 1 minúscula
                ->numbers()     // al menos 1 número
                ->symbols();    // al menos 1 carácter especial (., _, @, !, etc.)
        });
    }
}