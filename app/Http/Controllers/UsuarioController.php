<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::paginate(10);
        return view('usuarios.index', compact('usuarios'));
    }

    public function create(Request $request) {
    $usuario = new User();
    $oper = 'create';
    $disabled = ''; 
    $datos = ['exito' => null];

    if ($request->isMethod('post')) {
        $request->validate([
            'nombre'   => 'required|string|max:255',
            'email'    => 'required|email|unique:usuarios,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'nombre'   => $request->nombre,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        $datos['exito'] = "Operación realizada con éxito";
    }

    // Si es AJAX, devolvemos la vista SIN el layout (para que no salga la barra de navegación)
    if ($request->ajax()) {
        return view('usuarios.create', compact('usuario', 'oper', 'disabled', 'datos'));
    }

    return view('usuarios.create', compact('usuario', 'oper', 'disabled', 'datos'));
}

public function edit(Request $request, $id) {
    $usuario = User::findOrFail($id);
    $oper = "edit"; 
    $disabled = '';
    $datos = ['exito' => null];

    if ($request->isMethod('post')) {   
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email'  => 'required|email|unique:usuarios,email,'.$id,
        ]);

        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        if($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }
        $usuario->save();   
        
        $datos['exito'] = "Operación realizada con éxito";

        // IMPORTANTE: Si es AJAX, devolvemos SOLO la vista del formulario
        // sin pasar por el layout principal.
        if ($request->ajax()) {
            return view('usuarios.create', compact('usuario', 'oper', 'disabled', 'datos'));
        }
    }

    return view('usuarios.create', compact('usuario', 'oper', 'disabled', 'datos'));
}

    public function show(Request $request, $id) { // Añadido Request aquí por si acaso
        $usuario = User::findOrFail($id);
        $oper = 'show';
        $disabled = 'disabled'; 
        $datos = ['exito' => null];
        
        // No necesitamos lógica compleja aquí, solo devolver la vista
        return view('usuarios.create', compact('usuario', 'oper', 'disabled', 'datos'));
    }

    public function destroy(Request $request, $id) {
        $usuario = User::findOrFail($id);
        $oper = 'destroy';
        $disabled = 'disabled';
        $datos = ['exito' => null];

        if ($request->isMethod('post')) {
            $usuario->delete();
            $datos['exito'] = "Operación realizada con éxito";
            
            // Devolvemos la vista para que el JS la pinte en el modal
            if ($request->ajax() || $request->input('modo') == 'ajax') {
                return view('usuarios.create', compact('usuario', 'oper', 'disabled', 'datos'));
            }
        }

        return view('usuarios.create', compact('usuario', 'oper', 'disabled', 'datos'));
    }
    
}











