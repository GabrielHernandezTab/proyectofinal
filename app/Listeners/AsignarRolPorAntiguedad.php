<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class AsignarRolPorAntiguedad
{
    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
{
    $user = $event->user;

    // Si ya tiene rol de Admin, no hacemos nada
    if ($user->hasRole(['admin', 'Súper Admin'])) {
        return;
    }

    // Al registrarse por el Front, siempre es "Usuario" raso
    $rolBase = Role::firstOrCreate(['name' => 'Usuario']);
    
    $user->rol = 'Usuario';
    $user->syncRoles([$rolBase]);
    $user->save();

    Log::info("Usuario {$user->email} registrado con rol inicial.");
}
}