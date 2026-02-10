<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;


class Donante extends Model
{
    //
    protected $table = 'donantes'; // Forzamos el nombre de la tabla
    use HasFactory, Notifiable;


    protected $fillable = ['usuario_id', 'edad', 'iban', 'valoracion'];

    public static $valoraciones = [
        'PR' => '★★★★★', // Premium
        'OR' => '★★★★',  // Oro
        'PL' => '★★★',   // Plata
        'ST' => '★★',    // Estándar
        'BA' => '★'      // Básico
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}

