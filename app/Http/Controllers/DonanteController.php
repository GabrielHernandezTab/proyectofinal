<?php

namespace App\Http\Controllers;

use App\Models\Donante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DonanteController extends Controller
{
    public function index()
    {
        // Ordenamos por último creado para ver la donación nueva arriba
        $donantes = Donante::with('usuario')->orderBy('id', 'desc')->paginate(10);
        return view('donantes.index', ['donantes' => $donantes, 'valoracion' => Donante::$valoraciones]);
    }

    // Método para donación PÚBLICA (Usuario normal)
    public function store(Request $request)
    {
        $request->validate([
            'edad'       => 'required|numeric|min:18',
            'importe'    => 'required|numeric|min:1',
            'valoracion' => 'required',
            'iban'       => ['required', 'regex:/^ES\d{22}$/'],
        ],
         [
            'edad.required'    => 'La edad es obligatoria.',
            'edad.regex'    => 'Debes ser mayor de edad',
            'edad.min'      => 'Debes ser mayor de edad',
            'importe.required' => 'El importe es obligatorio.',
            'iban.regex'       => 'Formato IBAN incorrecto (ES...)',
            'iban.required'       => 'El IBAN es obligatorio',
            'valoracion.required' => 'Por favor, valora el servicio.'
        ]);

       

        // Crear registro
        $donacion = new Donante();
        $donacion->usuario_id = auth()->id(); // Asigna el usuario logueado automáticamente
        $donacion->edad       = $request->edad;
        $donacion->importe    = $request->importe;
        $donacion->valoracion = $request->valoracion;
        $donacion->iban       = $request->iban;
        $donacion->save();

        // Respuesta JSON siempre si viene del modal
        if ($request->ajax() || $request->input('modo') == 'ajax') {
            return response()->json(['exito' => '¡Donación realizada correctamente!']);
        }
        return redirect()->back()->with('exito', 'Donación realizada correctamente');    
        }

        public function show(string $id, Request $request)
        {
            $donante = Donante::findOrFail($id);
            $valoraciones = Donante::$valoraciones;
        
            $params = [
                'donante'      => $donante, 
                'valoraciones' => $valoraciones, 
                'disabled'     => 'disabled', // Bloquea los inputs
                'oper'         => 'show',
                'titulo'       => 'Detalles de la Donación'
            ];
        
            // Si es el modal del admin
            if ($request->input('modo') == 'ajax') {
                return view('donantes.modoAdmin', $params);
            }
            
            // Si por casualidad entran por URL
            return view('donantes.create', $params);
        }
        
        public function formularioPublico(Request $request)
        {
            $donante = new Donante();
            $valoraciones = Donante::$valoraciones;
            $oper = 'publico';
            $disabled = '';
            $datos = ['exito' => ''];
        
            // EL USUARIO SIEMPRE VE LA VISTA COMPLETA (CREATE)
            return view('donantes.create', compact('donante', 'valoraciones', 'oper', 'disabled', 'datos'));
        }

}

