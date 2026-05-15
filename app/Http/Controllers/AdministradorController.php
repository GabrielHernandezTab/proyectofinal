<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrador;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdministradorController extends Controller
{
    public function index()
    {
        $administradores = Administrador::with('usuario')->paginate(10);
        return view('administradores.index', compact('administradores'));
    }

    public function operacion(Request $request, $oper, $id = null)
    {
        $admin    = $id ? Administrador::with('usuario')->findOrFail($id) : new Administrador();
        $disabled = '';
        $datos    = ['exito' => null];

        if ($oper === 'create' && $request->isMethod('post')) {
            $request->validate([
                'nombre'   => 'required|string|max:255',
                'email'    => 'required|email|unique:usuarios,email',
                'password' => ['required', \Illuminate\Validation\Rules\Password::defaults()],
                'rol'      => 'required|in:Admin,Súper Admin',
            ]);

            $user = User::create([
                'nombre'   => $request->nombre,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'rol'      => $request->rol,
            ]);

            Administrador::create([
                'usuario_id' => $user->id,
                'rol'        => $request->rol,
            ]);

            $user->syncRoles(['admin']);
            $datos['exito'] = 'Administrador creado con éxito';
        }

        if ($oper === 'edit' && $request->isMethod('post')) {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'email'  => 'required|email|unique:usuarios,email,' . $admin->usuario_id,
                'rol'    => 'required|in:Admin,Súper Admin',
            ]);

            $admin->usuario->nombre = $request->nombre;
            $admin->usuario->email  = $request->email;
            if ($request->filled('password')) {
                $admin->usuario->password = Hash::make($request->password);
            }
            $admin->usuario->rol = $request->rol;
            $admin->usuario->save();

            $admin->rol = $request->rol;
            $admin->save();

            $datos['exito'] = 'Administrador actualizado con éxito';

            if ($request->ajax()) {
                return view('administradores.create', compact('admin', 'oper', 'disabled', 'datos'));
            }
        }

        if ($oper === 'show') {
            $disabled = 'disabled';
        }

        if ($oper === 'destroy' && $request->isMethod('post')) {
            $user = $admin->usuario;
            $admin->delete();
            $user->delete();
            $datos['exito'] = 'Administrador eliminado con éxito';

            if ($request->ajax() || $request->input('modo') == 'ajax') {
                return view('administradores.create', compact('admin', 'oper', 'disabled', 'datos'));
            }
        }

        return view('administradores.create', compact('admin', 'oper', 'disabled', 'datos'));
    }
}