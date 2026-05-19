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

        // Solo pueden entrar: Usuario Avanzado, Usuario Experto, Admin, Súper Admin
        $rolesPermitidos = ['Usuario Avanzado', 'Usuario Experto', 'Admin', 'Súper Admin'];

        if (!$user->hasAnyRole($rolesPermitidos)) {
            abort(403, 'Todavía no tienes acceso al Pack Avanzado. Se desbloquea 2 semanas después de tu registro.');
        }

        return view('cursos.avanzado'); 
    }

    public function supremo()
    {
        $user = Auth::user();

        // Solo pueden entrar: Usuario Experto, Admin, Súper Admin
        $rolesPermitidos = ['Usuario Experto', 'Admin', 'Súper Admin'];

        if (!$user->hasAnyRole($rolesPermitidos)) {
            abort(403, 'Todavía no tienes acceso al Pack Supremo. Se desbloquea 2 meses después de tu registro.');
        }

        return view('cursos.supremo'); 
    }
}

/*

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        return view('usuarios.planes'); 
    }

Ejemplo de Modelo-Vista-Controllador

public function basico()
        {
            return view('cursos.basico'); 
        }
public function avanzado()
        {
            return view('cursos.avanzado'); 
        }

public function supremo()
        {
            return view('cursos.supremo'); 
        }




        }


*/