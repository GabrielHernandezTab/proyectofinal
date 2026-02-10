<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Usuario extends Model
{
    protected $table = 'usuarios'; // Forzamos el nombre de la tabla
    use HasFactory, Notifiable;

    protected $fillable = [
         'nombre'
        ,'email'
        ,'password'
    ];

    /*
    // Relación: Un usuario tiene muchas donaciones
    public function donaciones() {
        return $this->hasMany(Donante::class, 'usuario_id');
    }
    */

}