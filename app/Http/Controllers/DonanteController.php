<?php

namespace App\Http\Controllers;

use App\Models\Donante;
use App\Models\User;
use Illuminate\Http\Request;

class DonanteController extends Controller
{
    public function index()
    {
        // Ordenamos por último creado para ver la donación nueva arriba
        $donantes = Donante::with('usuario')->orderBy('id', 'desc')->paginate(10);
        return view('donantes.index', ['donantes' => $donantes, 'valoracion' => Donante::$valoraciones]);
    }

    // Método para crear desde Panel Admin
    public function create(Request $request) {
        // 1. Si es POST, procesamos la validación y guardado
        if ($request->isMethod('post')) {
            // Laravel detectará que es AJAX y si falla devolverá JSON 422 automáticamente
            $validated = $request->validate([
                'usuario_id' => 'required|exists:users,id', // Ojo: tabla 'users' o 'usuarios' según tu BD
                'edad'       => ['required', 'numeric', 'min:18', 'regex:/^(1[8-9]|[2-9][0-9])$/'],
                'importe'    => 'required|numeric|min:1|max:300',
                'iban'       => ['required', 'regex:/^ES\d{22}$/'],
                'valoracion' => 'required|in:PR,OR,PL,ST,BA',              
            ], [
                'usuario_id.required' => 'Debes asignar un usuario.',
                'edad.required'       => 'La edad es obligatoria.',
                'edad.regex'          => 'Debes ser mayor de edad',
                'edad.min'      => 'Debes ser mayor de edad',
                'importe.required'    => 'Indica el importe.',
                'iban.regex'          => 'El IBAN debe ser ES + 22 dígitos.',
                'iban.required'       => 'El IBAN es obligatorio.',
                'valoracion.required' => 'La valoración es obligatoria.'
            ]);

            $donante = new Donante();
            $donante->usuario_id = $request->input('usuario_id'); // Admin asigna usuario manual
            $donante->edad       = $request->input('edad');
            $donante->importe    = $request->input('importe');
            $donante->valoracion = $request->input('valoracion');
            $donante->iban       = $request->input('iban');
            $donante->save();

            // RESPUESTA JSON PARA EL JAVASCRIPT
            return response()->json(['exito' => '¡Donante registrado correctamente!']);
        }

        // 2. Si es GET, mostramos el formulario
        $vars = [
            'donante' => new Donante(),
            'usuarios' => User::all(), 
            'datos' => ['exito' => ''],
            'disabled' => '',
            'valoraciones' => Donante::$valoraciones,
            'oper' => 'create'
        ];

        if ($request->input('modo') == 'ajax') {
            return view('donantes.create', $vars)->render();
        }
        return view('donantes.create', $vars);
    }

    // Método para donación PÚBLICA (Usuario normal)
    public function store(Request $request)
    {
        // Validación automática (retorna JSON 422 si falla)
        $request->validate([
            'edad'       => ['required', 'numeric', 'min:18', 'regex:/^(1[8-9]|[2-9][0-9])$/'],
            'importe'    => 'required|numeric|min:1',
            'valoracion' => 'required',
            'iban'       => ['required', 'regex:/^ES\d{22}$/'],
        ], [
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
return redirect()->back()->with('exito', 'Donación realizada correctamente');    }

    public function edit(Request $request, string $id = '')
    {
        $id_Donante = $id ?: $request->input('id_actual');
        $donante = Donante::findOrFail($id_Donante);

        if ($request->isMethod('post')) {   
            // Validación automática
            $request->validate([
                'usuario_id' => 'required|exists:users,id',
                'edad'       => ['required', 'numeric', 'min:18', 'regex:/^(1[8-9]|[2-9][0-9])$/'],
                'importe'    => 'required|numeric|min:1',
                'iban'       => ['required', 'regex:/^ES\d{22}$/'],
                'valoracion' => 'required',
            ]);

            $donante->usuario_id = $request->input('usuario_id');
            $donante->edad       = $request->input('edad');
            $donante->importe    = $request->input('importe');
            $donante->valoracion = $request->input('valoracion');
            $donante->iban       = $request->input('iban');
            $donante->save();   
            
            return response()->json(['exito' => 'Datos actualizados correctamente']);
        }

        // Vista GET
        $vars = [
            'donante' => $donante,
            'usuarios' => User::all(),
            'valoraciones' => Donante::$valoraciones,
            'datos' => ['exito' => ''],
            'disabled' => '',
            'oper' => "edit"
        ];
        
        return ($request->input('modo') == 'ajax') ? view('donantes.create', $vars)->render() : view('donantes.create', $vars);
    }

    public function destroy(Request $request, string $id)
    {
        $donante = Donante::findOrFail($id);
        
        if ($request->isMethod('post') || $request->isMethod('delete')) {
            $donante->delete();
            
            if ($request->ajax() || $request->input('modo') == 'ajax') {
                return response()->json(['exito' => 'Registro eliminado correctamente']);
            }
            return redirect()->route('donacion.index');
        }

        // Vista de confirmación (GET)
        $vars = [
            'donante' => $donante, 
            'valoraciones' => Donante::$valoraciones, 
            'usuarios' => User::all(), 
            'oper' => 'destroy', 
            'disabled' => 'disabled', 
            'datos' => ['exito' => '']
        ];
        return ($request->input('modo') == 'ajax') ? view('donantes.create', $vars)->render() : view('donantes.create', $vars);
    }

    public function show(string $id, Request $request)
    {
        $donante = Donante::findOrFail($id);
        $vars = [
            'donante' => $donante, 
            'datos' => ['exito' => ''], 
            'valoraciones' => Donante::$valoraciones, 
            'usuarios' => User::all(), 
            'disabled' => 'disabled', 
            'oper' => 'show'
        ];
        return ($request->input('modo') == 'ajax') ? view('donantes.create', $vars)->render() : view('donantes.create', $vars);
    }

    // Método auxiliar para lanzar el formulario público (si lo usas por URL directa)
    public function formularioPublico()
    {
        return view('donantes.create', [
            'donante' => new Donante(),
            'usuarios' => [], 
            'valoraciones' => Donante::$valoraciones,
            'oper' => 'publico', // Esto hace que el form apunte a 'store'
            'disabled' => '',
            'datos' => ['exito' => '']
        ]);
    }
}