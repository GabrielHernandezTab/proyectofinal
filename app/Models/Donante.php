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


    protected $fillable = ['usuario_id', 'iban', 'valoracion'];

    public static $valoraciones = [
        '★★★★★' => '★★★★★',
        '★★★★' => '★★★★',
        '★★★' => '★★★',
        '★★' => '★★',
        '★' => '★'
    ];

}

