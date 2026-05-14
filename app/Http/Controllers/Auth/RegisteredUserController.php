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
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $mensajePassword = 'El campo contraseña debe tener al menos una letra mayúscula, una minúscula, un número y un símbolo.';

        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'password.min'      => $mensajePassword,
            'password.mixed'    => $mensajePassword,
            'password.numbers'  => $mensajePassword,
            'password.symbols'  => $mensajePassword,
            'password.confirmed'=> 'Las contraseñas no coinciden.',
        ]);

        $user = User::create([
            'nombre'   => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'rol'      => 'Usuario',
        ]);

        $user->refresh();

        event(new Registered($user));
        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}