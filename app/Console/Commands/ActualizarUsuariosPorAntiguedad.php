<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;

class ActualizarUsuariosPorAntiguedad extends Command
{
    protected $signature = 'usuarios:actualizar-roles';
    protected $description = 'Actualiza usuarios a Avanzado o Experto según antigüedad, excluyendo Admin y Súper Admin';

    public function handle()
{
    $this->info('Iniciando actualización de roles...');

    $rolAvanzado = Role::firstOrCreate(['name' => 'Usuario Avanzado']);
    $rolExperto = Role::firstOrCreate(['name' => 'Usuario Experto']);

    // Tiempos (Usando tus minutos de prueba)
    //$fechaAvanzado = Carbon::now()->subMinutes(1);
    //$fechaExperto = Carbon::now()->subMinutes(5);

    $fechaAvanzado = Carbon::now()->subWeeks(2);
    $fechaExperto = Carbon::now()->subMonths(2);

    /*
    |--------------------------------------------------------------------------
    | 1️⃣ PRIMERO: USUARIOS EXPERTO (> 2 meses)
    |--------------------------------------------------------------------------
    | Buscamos a los que YA son Avanzados y cumplen el tiempo para ser Expertos.
    */
    $usuariosParaExperto = User::where('rol', 'Usuario Avanzado')
        ->where('created_at', '<=', $fechaExperto)
        ->whereNotIn('rol', ['Admin', 'Súper Admin'])
        ->get();

    foreach ($usuariosParaExperto as $usuario) {
        $usuario->rol = 'Usuario Experto';
        $usuario->save();
        $usuario->syncRoles([$rolExperto]);
        $this->info("⭐ {$usuario->nombre} subió a Experto.");
    }

    /*
    |--------------------------------------------------------------------------
    | 2️⃣ SEGUNDO: USUARIOS AVANZADOS (> 2 semanas)
    |--------------------------------------------------------------------------
    | Buscamos a los que son "Usuario" base y cumplen el tiempo.
    */
    $usuariosParaAvanzado = User::whereIn('rol', ['Usuario', 'usuario'])
        ->where('created_at', '<=', $fechaAvanzado)
        // Importante: No tocar a los que ya son más antiguos que el tiempo de experto
        // o simplemente confiar en que el filtro 'Usuario' base es suficiente.
        ->whereNotIn('rol', ['Admin', 'Súper Admin'])
        ->get();

    foreach ($usuariosParaAvanzado as $usuario) {
        $usuario->rol = 'Usuario Avanzado';
        $usuario->save();
        $usuario->syncRoles([$rolAvanzado]);
        $this->info("🔹 {$usuario->nombre} subió a Avanzado.");
    }

    $this->info('Proceso completado.');
}
}