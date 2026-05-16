<?php

namespace App\Http\Controllers;

use App\Models\ProgresoCurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgresoCursoController extends Controller
{
    public function guardar(Request $request)
    {
        // sendBeacon envía JSON en el body, no como form-data
        if ($request->isJson()) {
            $data = $request->json()->all();
            $request->merge($data);
        }

        $request->validate([
            'curso'    => 'required|in:basico,avanzado,supremo',
            'segundos' => 'required|integer|min:1|max:10800',
        ]);

        $usuario = Auth::user();
        if (!$usuario) return response()->json(['error' => 'No autenticado'], 401);

        $progreso = ProgresoCurso::firstOrNew([
            'usuario_id' => $usuario->id,
            'curso'      => $request->curso,
        ]);

        $progreso->segundos_totales = ($progreso->segundos_totales ?? 0) + (int) $request->segundos;
        $progreso->save();

        return response()->json(['porcentaje' => $progreso->porcentaje()]);
    }
}