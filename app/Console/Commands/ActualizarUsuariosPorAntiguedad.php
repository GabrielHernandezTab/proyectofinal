<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;

class ActualizarUsuariosPorAntiguedad extends Command
{
    protected $signature = 'usuarios:actualizar-roles';
    protected $description = 'Actualiza usuarios a Avanzado o Experto según antigüedad, excluyendo admins';

    public function handle()
    {
        // 1️⃣ Crear los roles si no existen
        $rolAvanzado = Role::firstOrCreate(['name' => 'Usuario Avanzado']);
        $rolExperto = Role::firstOrCreate(['name' => 'Usuario Experto']);

        // 2️⃣ Fechas límite
        $fechaAvanzado = Carbon::now()->subWeeks(2);
        $fechaExperto = Carbon::now()->subMonths(2);

        // 3️⃣ Usuarios expertos (>2 meses, no Admin/Súper Admin)
        $usuariosExperto = User::where('created_at', '<=', $fechaExperto)
                                ->where('rol', '!=', 'Usuario Experto')
                                ->whereNotIn('rol', ['Admin', 'Súper Admin'])
                                ->get();

        foreach ($usuariosExperto as $usuario) {
            $usuario->rol = 'Usuario Experto';
            $usuario->save();
            $usuario->assignRole($rolExperto);
            $this->info("Usuario {$usuario->nombre} actualizado a Usuario Experto.");
        }

        // 4️⃣ Usuarios avanzados (>2 semanas, no Admin/Súper Admin ni Experto)
        $usuariosAvanzado = User::where('created_at', '<=', $fechaAvanzado)
                                ->where('rol', '!=', 'Usuario Avanzado')
                                ->where('rol', '!=', 'Usuario Experto') // no sobrescribir expertos
                                ->whereNotIn('rol', ['Admin', 'Súper Admin'])
                                ->get();

        foreach ($usuariosAvanzado as $usuario) {
            $usuario->rol = 'Usuario Avanzado';
            $usuario->save();
            $usuario->assignRole($rolAvanzado);
            $this->info("Usuario {$usuario->nombre} actualizado a Usuario Avanzado.");
        }

        $this->info('Proceso completado.');
    }
}
