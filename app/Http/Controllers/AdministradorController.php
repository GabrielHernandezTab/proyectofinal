<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Usuario;
use Illuminate\Http\Request;

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
        $usuarios = Usuario::all(); // Para select en create/edit
        $datos = ['exito' => ''];
        $disabled = ($oper == 'show' || $oper == 'destroy') ? 'disabled' : '';

        if ($request->isMethod('post')) {
            $request->validate([
                'usuario_id' => 'required|exists:usuarios,id',
                'rol' => 'required'
            ]);

            if ($oper == 'destroy') {
                $admin->delete();
                $datos['exito'] = 'Administrador eliminado.';
                $disabled = 'disabled';
            } else {
                $admin->usuario_id = $request->input('usuario_id');
                $admin->rol = $request->input('rol');
                $admin->save();

                $datos['exito'] = 'Administrador guardado.';
                $disabled = 'disabled';
            }
        }

        return view('administradores.create', compact('admin', 'usuarios', 'datos', 'disabled', 'oper'))->render();
    }
}
