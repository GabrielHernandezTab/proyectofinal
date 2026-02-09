<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    public function index()
{
    $usuarios = User::paginate(10);
    
    // Usamos puntos para entrar en las carpetas: layouts -> usuarios -> index
    return view('layouts.usuarios.index', [
        'usuarios' => $usuarios,

    ]);
}

    public function create(Request $request)
    {
        $usuario = new Usuario();
        $datos = ['exito' => ''];
        $disabled = '';
        $oper = 'create';

        if ($request->isMethod('post')) {
            try {
                $request->validate([
                    'nombre'   => 'required|string|max:255',
                    'apellido' => 'required|string|max:255',
                    'email'    => 'required|string|email|unique:usuarios,email',
                    'genero'   => 'required|string|max:255',
                ]);

                $usuario->nombre   = $request->input('nombre');
                $usuario->apellido = $request->input('apellido');
                $usuario->email    = $request->input('email');
                $usuario->genero   = $request->input('genero');
                $usuario->save();

                $datos['exito'] = 'Usuario creado correctamente';
                $disabled = 'disabled';
            } catch (\Illuminate\Validation\ValidationException $e) {
                if ($request->input('modo') == 'ajax') {
                    return view('usuarios.create', compact('usuario', 'datos', 'disabled'))
                        ->with('cods_genero', Usuario::$cods_genero)
                        ->with('oper', $oper)
                        ->withErrors($e->validator)
                        ->render();
                }
            }
        }

        if ($request->input('modo') == 'ajax') {
            return view('usuarios.create', compact('usuario', 'datos', 'disabled'))
                ->with('cods_genero', Usuario::$cods_genero)
                ->with('oper', $oper)
                ->render();
        }

        return view('usuarios.create', compact('usuario', 'datos', 'disabled'))
            ->with('cods_genero', Usuario::$cods_genero)
            ->with('oper', $oper);
    }

    public function show(string $id, Request $request)
    {
        $usuario = Usuario::find($id);
        $datos = ['exito' => ''];
        $disabled = 'disabled';
        $oper = 'show';

        if ($request->input('modo') == 'ajax') {
            return view('usuarios.create', compact('usuario', 'datos', 'disabled'))
                ->with('cods_genero', Usuario::$cods_genero)
                ->with('oper', $oper)
                ->render();
        }

        return view('usuarios.create', compact('usuario', 'datos', 'disabled'))
            ->with('cods_genero', Usuario::$cods_genero)
            ->with('oper', $oper);
    }

    public function edit(Request $request, string $id = '')
    {
        $id_usuario = $id ?: $request->input('id');
        $usuario = Usuario::find($id_usuario);
        $datos = ['exito' => ''];
        $disabled = '';
        $oper = 'edit';

        if ($request->isMethod('post')) {
            try {
                $request->validate([
                    'nombre'   => 'required|string|max:255',
                    'apellido' => 'required|string|max:255',
                    'email'    => 'required|string|email|unique:usuarios,email,' . $usuario->id,
                    'genero'   => 'required|string|max:255',
                ]);

                $usuario->nombre   = $request->input('nombre');
                $usuario->apellido = $request->input('apellido');
                $usuario->email    = $request->input('email');
                $usuario->genero   = $request->input('genero');
                $usuario->save();

                $datos['exito'] = 'Usuario actualizado correctamente';
                $disabled = 'disabled';
            } catch (\Illuminate\Validation\ValidationException $e) {
                if ($request->input('modo') == 'ajax') {
                    return view('usuarios.create', compact('usuario', 'datos', 'disabled'))
                        ->with('cods_genero', Usuario::$cods_genero)
                        ->with('oper', $oper)
                        ->withErrors($e->validator)
                        ->render();
                }
            }
        }

        if ($request->input('modo') == 'ajax') {
            return view('usuarios.create', compact('usuario', 'datos', 'disabled'))
                ->with('cods_genero', Usuario::$cods_genero)
                ->with('oper', $oper)
                ->render();
        }

        return view('usuarios.create', compact('usuario', 'datos', 'disabled'))
            ->with('cods_genero', Usuario::$cods_genero)
            ->with('oper', $oper);
    }

    public function destroy(Request $request, string $id = '')
    {
        $id_usuario = $id ?: $request->input('id');
        $usuario = Usuario::find($id_usuario);
        $datos = ['exito' => ''];

        if ($request->isMethod('post')) {
            if ($usuario) { $usuario->delete(); }
            $datos['exito'] = 'Usuario eliminado correctamente';
            $usuario = new Usuario();
            $disabled = 'disabled';
            $oper = 'destroy';

            return view('usuarios.create', compact('usuario', 'datos', 'disabled'))
                ->with('cods_genero', Usuario::$cods_genero)
                ->with('oper', $oper)
                ->render();
        }

        $disabled = 'disabled';
        $oper = 'destroy';

        if ($request->input('modo') == 'ajax') {
            return view('usuarios.create', compact('usuario', 'datos', 'disabled'))
                ->with('cods_genero', Usuario::$cods_genero)
                ->with('oper', $oper)
                ->render();
        }

        return view('usuarios.create', compact('usuario', 'datos', 'disabled'))
            ->with('cods_genero', Usuario::$cods_genero)
            ->with('oper', $oper);
    }
}
