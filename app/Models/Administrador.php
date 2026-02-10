<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Administrador extends Model
{
    use HasFactory, Notifiable;
    // Nombre de la tabla (importante porque es plural en español)
    protected $table = 'administradores';

    protected $fillable = [
        'usuario_id',
        'rol',
    ];

    /**
     * Relación con el modelo Usuario
     */
    public function usuario(): BelongsTo
    {
        // Esto le dice a Laravel: "Un administrador pertenece a un usuario"
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}