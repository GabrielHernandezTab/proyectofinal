<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;
use App\Models\User;

class AdministradorController extends Controller
{
    // Mostrar listado de administradores
    public function index()
    {
        $administradores = Administrador::with('usuario')->paginate(10);
        return view('administradores.index', compact('administradores'));
    }

public function operacion(Request $request, $oper, $id = null)
{
    $admin = $id ? Administrador::find($id) : new Administrador();
    $datos = ['exito' => ''];
    $disabled = ($oper == 'show' || $oper == 'destroy') ? 'disabled' : '';

    if ($request->isMethod('post')) {
if ($oper == 'destroy') {
    // 1. Buscamos al administrador y a su usuario asociado
    $usuarioAsociado = $admin->usuario;

    // 2. Borramos el perfil de administrador
    $admin->delete();

    // 3. (Opcional) Si quieres borrar también el usuario para que no pueda loguearse:
    // if($usuarioAsociado) $usuarioAsociado->delete();

    // 4. PREPARAMOS EL ÉXITO PARA LA VISTA
    $datos['exito'] = 'Administrador eliminado con éxito.';
    $disabled = 'disabled'; // Para bloquear los campos
    
    // Devolvemos la vista en lugar de un JSON
    return view('administradores.create', compact('admin', 'datos', 'disabled', 'oper'));
}

        // VALIDACIÓN
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . ($admin->usuario_id ?? 'NULL'),
            'rol' => 'required',
            'password' => $oper == 'create' ? 'required|min:6' : 'nullable|min:6',
        ]);

        // 1. Creamos o actualizamos el USUARIO (para que pueda hacer login)
        if ($oper == 'create') {
            $usuario = User::create([
                'nombre' => $request->nombre,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'rol' => $request->rol, // Marcamos el rol en la tabla usuarios también
            ]);
            $admin->usuario_id = $usuario->id;
        } else {
            $usuario = $admin->usuario;
            $usuario->update([
                'nombre' => $request->nombre,
                'email' => $request->email,
                'rol' => $request->rol,
            ]);
            if ($request->filled('password')) {
                $usuario->password = bcrypt($request->password);
                $usuario->save();
            }
        }

        // 2. Guardamos en la tabla de ADMINISTRADORES
        $admin->rol = $request->rol;
        $admin->save();

        $datos['exito'] = 'Operación realizada con éxito';
        $disabled = 'disabled';
    }

    return view('administradores.create', compact('admin', 'datos', 'disabled', 'oper'));
}


}
