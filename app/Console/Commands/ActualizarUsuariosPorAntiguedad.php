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

        // 1️⃣ Crear roles si no existen
        $rolAvanzado = Role::firstOrCreate(['name' => 'Usuario Avanzado']);
        $rolExperto = Role::firstOrCreate(['name' => 'Usuario Experto']);

        // 2️⃣ Calcular fechas límite
        $fechaAvanzado = Carbon::now()->subWeeks(2);
        $fechaExperto = Carbon::now()->subMonths(2);

        /*
        |--------------------------------------------------------------------------
        | 3️⃣ USUARIOS EXPERTOS (> 2 meses)
        |--------------------------------------------------------------------------
        */
        $usuariosExperto = User::where('created_at', '<=', $fechaExperto)
            ->whereNotIn('rol', ['Admin', 'Súper Admin'])
            ->get();

        foreach ($usuariosExperto as $usuario) {

            // Si ya es experto, lo saltamos
            if ($usuario->rol === 'Usuario Experto') {
                continue;
            }

            $usuario->rol = 'Usuario Experto';
            $usuario->save();

            // IMPORTANTE: reemplaza cualquier rol anterior
            $usuario->syncRoles([$rolExperto]);

            $this->info("✔ {$usuario->nombre} ahora es Usuario Experto.");
        }

        /*
        |--------------------------------------------------------------------------
        | 4️⃣ USUARIOS AVANZADOS (> 2 semanas y < 2 meses)
        |--------------------------------------------------------------------------
        */
        $usuariosAvanzado = User::where('created_at', '<=', $fechaAvanzado)
            ->where('created_at', '>', $fechaExperto) // Para que no pille expertos
            ->whereNotIn('rol', ['Admin', 'Súper Admin'])
            ->get();

        foreach ($usuariosAvanzado as $usuario) {

            // Si ya es avanzado, lo saltamos
            if ($usuario->rol === 'Usuario Avanzado') {
                continue;
            }

            $usuario->rol = 'Usuario Avanzado';
            $usuario->save();

            // Reemplaza cualquier rol anterior
            $usuario->syncRoles([$rolAvanzado]);

            $this->info("✔ {$usuario->nombre} ahora es Usuario Avanzado.");
        }

        $this->info('Proceso completado correctamente.');
    }
}