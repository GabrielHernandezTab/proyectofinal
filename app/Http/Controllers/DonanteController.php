<?php

namespace App\Http\Controllers;

use App\Models\Donante;
use Illuminate\Http\Request;

class DonanteController extends Controller
{
    // Vista para el Admin
    public function index()
    {
        $donantes = Donante::with('usuario')->get();
        return view('donantes.index', compact('donantes'));
    }

    // Formulario para el Usuario (AJAX)
    public function create(Request $request)
    {
        $donante = new Donante();
        $datos = ['exito' => ''];
        $disabled = '';
        $oper = 'create';
    
        if ($request->isMethod('post')) {
            try {
                $request->validate([
                    'iban' => 'required|min:24',
                    'valoracion' => 'required|integer|between:1,5'
                ]);
    
                Donante::create([
                    'usuario_id' => auth()->id(),
                    'iban' => $request->input('iban'),
                    'valoracion' => $request->input('valoracion')
                ]);
    
                $datos['exito'] = 'Donación registrada con éxito.';
                $disabled = 'disabled';
            } catch (\Illuminate\Validation\ValidationException $e) {
                // Si hay error de validación, devolvemos la vista con errores
                return view('donantes.create', compact('donante', 'datos', 'disabled', 'oper'))
                       ->withErrors($e->validator)->render();
            }
        }
    
        // El render() es fundamental para que el JS reciba solo el HTML del formulario
        return view('donantes.create', compact('donante', 'datos', 'disabled', 'oper'))->render();
    }
    
}