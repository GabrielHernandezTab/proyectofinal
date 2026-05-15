<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\Auth\Events\Registered;
use App\Listeners\AsignarRolPorAntiguedad;
use Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Reglas de contraseña globales
        Password::defaults(function () {
            return Password::min(8)
                ->mixedCase()
                ->numbers()
                ->symbols();
        });

        // Registrar eventos manualmente (Laravel 12 no autodescubre EventServiceProvider)
        Event::listen(Registered::class, AsignarRolPorAntiguedad::class);
    }
}