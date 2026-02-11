<?php

namespace App\Models;
use App\Models\Usuario;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;



class Donante extends Model
{
    //
    protected $table = 'donantes'; // Forzamos el nombre de la tabla
    use HasFactory, Notifiable;


    protected $fillable = ['usuario_id', 'edad', 'importe', 'iban', 'valoracion'];

    public static $valoraciones = [
        'PR' => '★★★★★', // Premium
        'OR' => '★★★★',  // Oro
        'PL' => '★★★',   // Plata
        'ST' => '★★',    // Estándar
        'BA' => '★'      // Básico
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}

