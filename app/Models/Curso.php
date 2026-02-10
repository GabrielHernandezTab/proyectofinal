<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;


class Curso extends Model
{
    //
    protected $table = 'cursos'; // Forzamos el nombre de la tabla
    use HasFactory, Notifiable;


    protected $fillable = ['titulo', 'descripcion', 'precio', 'horas'];

    public static $titulos = [
        'GR' => 'Gratuito',
        'AV' => 'Avanzado',
        'SP' => 'Supremo'
    ];
}
