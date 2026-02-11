<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = 'administradores';
    protected $fillable = ['usuario_id', 'rol'];

    public function usuario() {
        // CAMBIO AQUÍ: Cambia Usuario::class por User::class
        return $this->belongsTo(User::class, 'usuario_id');
    }
}