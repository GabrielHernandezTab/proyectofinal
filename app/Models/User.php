<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles; // Importante para que funcione @role

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    // Indicamos que use tu tabla personalizada
    protected $table = 'usuarios';

    // El guard debe ser web para que Spatie no se pierda
    protected $guard_name = 'web';

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'rol', // Tu columna personalizada
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}