<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles; 


class User extends Authenticatable implements MustVerifyEmail
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
        'rol',
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

    protected function setRolAttribute($value)
    {
        // Esto hace que si entra "usuario", se guarde como "Usuario" siempre.
        $this->attributes['rol'] = ucfirst(strtolower($value));
    }

    // Necesario porque la tabla es 'usuarios' en lugar de 'users' para usar la lógica de restablecimiento de contraseña de Laravel
    public function getEmailForPasswordReset(): string
    {
        return $this->email;
    }
    
    
}