<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function index()
    {
        $administradores = Administrador::with('usuario')->get();
        return view('administradores.index', compact('administradores'));
    }

    public function operacion(Request $request, $oper, $id = null)
    {
        $admin = $id ? Administrador::find($id) : new Administrador();
        $usuarios = Usuario::all(); // Para el select en el create
        $datos = ['exito' => ''];
        $disabled = ($oper == 'show' || $oper == 'destroy') ? 'disabled' : '';

        if ($request->isMethod('post')) {
            try {
                if ($oper == 'destroy') {
                    $admin->delete();
                    $datos['exito'] = 'Administrador revocado.';
                    $disabled = 'disabled';
                } else {
                    $request->validate([
                        'usuario_id' => 'required|exists:usuarios,id',
                        'rol' => 'required'
                    ]);

                    $admin->usuario_id = $request->input('usuario_id');
                    $admin->rol = $request->input('rol');
                    $admin->save();

                    $datos['exito'] = 'Datos de administrador guardados.';
                    $disabled = 'disabled';
                }
            } catch (\Illuminate\Validation\ValidationException $e) {
                return view('administradores.create', compact('admin', 'usuarios', 'datos', 'disabled', 'oper'))
                       ->withErrors($e->validator)->render();
            }
        }

        return view('administradores.create', compact('admin', 'usuarios', 'datos', 'disabled', 'oper'))->render();
    }
}