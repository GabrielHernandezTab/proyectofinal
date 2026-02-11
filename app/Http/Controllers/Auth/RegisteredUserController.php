<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Muestra la vista de registro.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Maneja la solicitud de registro entrante.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'], // Validamos 'name' que es lo que viene del HTML
            'email'    => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    
        $user = User::create([
            'nombre'   => $request->name, // Mapeamos el input 'name' a tu columna 'nombre'
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'rol'      => 'usuario', // Evitamos el error de campo 'rol' vacío que vimos en Tinker
        ]);
    
        event(new Registered($user));
        Auth::login($user);
    
        return redirect(route('dashboard', absolute: false));
    }
}