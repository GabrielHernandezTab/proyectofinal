<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validamos apuntando a la tabla 'usuarios'
        $request->validate([
            'nombre'   => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:usuarios,email',
            'password' => 'required|string|min:8',
        ]);

        // 2. Creamos el usuario
        $user = User::create([
            'nombre'   => $request->nombre,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'rol'      => 'Usuario', // Valor inicial
        ]);

        // 3. DISPARAMOS EL EVENTO (Esto activa tu Listener AsignarRolPorAntiguedad)
        event(new Registered($user));

        // 4. Logueamos al usuario automáticamente tras registrarse
        Auth::login($user);

        // 5. Redirigimos al dashboard
        return redirect()->route('dashboard');
    }
}