<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgresoCurso extends Model
{
    protected $table = 'progreso_cursos';

    protected $fillable = ['usuario_id', 'curso', 'segundos_totales'];

    // Tiempo máximo considerado "completado" (por curso, en segundos)
    // basico: 30 min, avanzado: 60 min, supremo: 90 min
    public static $maxSegundos = [
        'basico'   => 1800,
        'avanzado' => 3600,
        'supremo'  => 5400,
    ];

    public function porcentaje(): int
    {
        $max = self::$maxSegundos[$this->curso] ?? 1800;
        return min(100, (int) round(($this->segundos_totales / $max) * 100));
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}