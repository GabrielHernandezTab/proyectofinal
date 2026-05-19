<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    public function index()
    {
        return view('usuarios.planes'); 
    }

    public function basico()
    {
        // El Pack Inicial está disponible para todos los usuarios autenticados
        return view('cursos.basico'); 
    }

    public function avanzado()
    {
        $user = Auth::user();

        $rolesPermitidos = ['Usuario Avanzado', 'Usuario Experto', 'admin'];

        if (!$user->hasAnyRole($rolesPermitidos)) {
            return response()->view('errors.403-pack-avanzado', [], 200);
        }

        return view('cursos.avanzado'); 
    }

    public function supremo()
    {
        $user = Auth::user();

        $rolesPermitidos = ['Usuario Experto', 'admin'];

        if (!$user->hasAnyRole($rolesPermitidos)) {
            return response()->view('errors.403-pack-supremo', [], 200);
        }

        return view('cursos.supremo'); 
    }
}

