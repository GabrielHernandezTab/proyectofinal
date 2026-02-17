<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Los comandos Artisan disponibles.
     *
     * @var array<int, class-string|string>
     */
    protected $commands = [
        // Aquí puedes registrar tus comandos manualmente si quieres
        // Ej: \App\Console\Commands\ActualizarUsuariosPorAntiguedad::class,
    ];

    /**
     * Define el schedule de la aplicación.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Ejecuta el comando cada minuto para pruebas
        $schedule->command('usuarios:actualizar-roles')->everyMinute();
    }

    /**
     * Registra los comandos Artisan
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
