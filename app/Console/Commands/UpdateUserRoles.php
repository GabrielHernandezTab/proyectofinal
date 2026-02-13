<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class UpdateUserRoles extends Command
{
    // El nombre que usarás en la terminal
    protected $signature = 'users:upgrade-roles';
    protected $description = 'Sube de nivel a los usuarios con más de un mes de antigüedad';

    public function handle()
{
    // Buscamos usuarios con rol 'usuario' creados hace más de 30 días
    $usuarios = User::role('usuario')
        ->where('created_at', '<=', now()->subMonth())
        ->get();

    foreach ($usuarios as $user) {
        // syncRoles actualiza la tabla 'model_has_roles' en la base de datos
        $user->syncRoles(['Usuario Avanzado']);
        $this->info("Rol actualizado para: {$user->email}");
    }
}
}