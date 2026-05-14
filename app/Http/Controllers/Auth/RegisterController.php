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
        $mensajePassword = 'El campo contraseña debe tener al menos una letra mayúscula, una minúscula, un número y un símbolo.';

        $request->validate([
            'nombre'   => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:usuarios,email',
            'password' => ['required', 'string', \Illuminate\Validation\Rules\Password::defaults()],
        ], [
            'password.min'     => $mensajePassword,
            'password.mixed'   => $mensajePassword,
            'password.numbers' => $mensajePassword,
            'password.symbols' => $mensajePassword,
        ]);

        $user = User::create([
            'nombre'   => $request->nombre,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'rol'      => 'Usuario',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}