<?php

namespace App\Http\Controllers;

use App\Models\Donante;
use App\Models\Usuario;
use Illuminate\Http\Request;

class DonanteController extends Controller
{
    public function index()
    {
        $donantes = Donante::paginate(10);
        return view('donantes.index', ['donantes' => $donantes, 'valoracion' => Donante::$valoraciones]);
    }

    public function create(Request $request) {
        $donante = new Donante();
        $usuarios = Usuario::all(); 
        $datos = ['exito' => ''];
        $disabled = '';
        $valoraciones = Donante::$valoraciones;
        $oper = 'create';
    
        if ($request->isMethod('post')) {
            try {
                $request->validate([
                    'usuario_id' => 'required|exists:usuarios,id',
                    'edad'      => 'required|numeric|min:18|max:120',
                    'iban'      => ['required', 'regex:/^ES\d{22}$/'],
                    'valoracion' => 'required|in:PR,OR,PL,ST,BA',                ],
                [
                    'edad.required'   => 'La edad es obligatoria.',
                    'edad.numeric'    => 'La edad debe ser un número.',
                    'edad.min'        => 'El donante debe ser mayor de edad.',
                    'valoracion.required' => 'La valoracion es obligatoria.',
                    'iban.required' => 'El IBAN es obligatorio.',
                    'iban.regex' => 'El IBAN debe ser ES + 22 dígitos.'
                ]);
    
                $donante->usuario_id = $request->input('usuario_id');
                $donante->edad = $request->input('edad');
                $donante->valoracion = $request->input('valoracion');
                $donante->iban      = $request->input('iban');
                $donante->save();
    
                $datos['exito'] = '¡Donante dado de alta!';
                $disabled = 'disabled';
            } catch (\Illuminate\Validation\ValidationException $e) {
                if ($request->input('modo') == 'ajax') {
                    return view('donantes.create', [
                        'donante' => $donante,
                        'datos' => $datos,
                        'disabled' => $disabled,
                        'valoraciones' => $valoraciones,
                        'usuarios'=> $usuarios,
                        'oper' => $oper
                    ])->withErrors($e->validator)->render();
                }
            }
        }
    
        if ($request->input('modo') == 'ajax') {
            return view('donantes.create', compact('donante', 'datos', 'disabled', 'valoraciones', 'usuarios'))->with('oper', 'create')->render();
        }
        return view('donantes.create', compact('donante', 'datos', 'disabled', 'valoraciones', 'usuarios'))->with('oper', 'create');
    }

    public function show(string $id, Request $request)
    {
        $donante = Donante::find($id);
        $usuarios = Usuario::all(); 
        $valoraciones = Donante::$valoraciones;
        $datos = ['exito' => ''];

        $vars = ['donante' => $donante, 'datos' => $datos, 'valoraciones' => $valoraciones, 'usuarios' => $usuarios, 'disabled' => 'disabled', 'oper' => 'show'];

        if ($request->input('modo') == 'ajax') {
            return view('donantes.create', $vars)->render();
        }
        return view('donantes.create', $vars);
    }

    public function edit(Request $request, string $id = '')
    {
        $id_Donante = $id ?: $request->input('id_actual');
        $donante = Donante::find($id_Donante);
        $usuarios = Usuario::all(); 
        $valoraciones = Donante::$valoraciones;
        $datos = ['exito' => ''];
        $disabled = '';
        
        // CAMBIO AQUÍ: Incluimos el ID en la operación para el action del form
        $oper = "edit"; 
    
        if ($request->isMethod('post')) {   
            try {
                $request->validate([
                    'usuario_id' => 'required|exists:usuarios,id',
                    'valoracion' => 'required|in:PR,OR,PL,ST,BA',
                    'edad'      => 'required|numeric|min:18|max:120',
                    'iban'      => ['required', 'regex:/^ES\d{22}$/']
                ]);
    
                $donante->usuario_id = $request->input('usuario_id');
                $donante->edad = $request->input('edad');
                $donante->valoracion = $request->input('valoracion');
                $donante->iban = $request->input('iban');
                $donante->save();   
                
                $datos['exito'] = 'Operación realizada correctamente';
                $disabled = 'disabled';
            } catch (\Illuminate\Validation\ValidationException $e) {
                if ($request->input('modo') == 'ajax') {
                    return view('donantes.create', [
                        'donante' => $donante,
                        'datos' => $datos,
                        'disabled' => $disabled,
                        'valoraciones' => $valoraciones,
                        'usuarios' => $usuarios,
                        'oper' => $oper // Mantenemos el edit/ID aquí también
                    ])->withErrors($e->validator)->render();
                }
            }
        }
    
        $vars = compact('donante', 'datos', 'valoraciones', 'disabled', 'usuarios', 'oper');
        if ($request->input('modo') == 'ajax') {
            return view('donantes.create', $vars)->render();
        }
        return view('donantes.create', $vars);
    }    
    
    
    public function destroy(Request $request, string $id = '')
    {
        // Obtenemos el ID de la URL o del campo oculto
        $id_Donante = $id ?: $request->input('id_actual');
        $donante = Donante::find($id_Donante);
        $usuarios = Usuario::all(); 
        $valoraciones = Donante::$valoraciones;
    
        // FORZAMOS LA RUTA CON ID: Esto evita el error 404 al enviar el formulario
        $oper = "destroy"; 
    
        if ($request->isMethod('post')) {
            if ($donante) {
                $donante->delete();
            }
            $datos = ['exito' => 'Donante eliminado correctamente'];
            
            // Al terminar, devolvemos una vista limpia
            return view('donantes.create', [
                'donante' => new Donante(), 
                'valoraciones' => $valoraciones, 
                'usuarios' => $usuarios,
                'oper' => 'create', 
                'disabled' => 'disabled', 
                'datos' => $datos
            ])->render();
        }
    
        return view('donantes.create', [
            'donante' => $donante, 
            'valoraciones' => $valoraciones, 
            'usuarios' => $usuarios,
            'oper' => $oper, 
            'disabled' => 'disabled', 
            'datos' => ['exito' => '']
        ]);
    }




    public function realizarDonacion(Request $request)
    {
        // 1. Validamos los datos
        $request->validate([
            'edad'       => 'required|numeric|min:18|max:120',
            'iban'       => ['required', 'regex:/^ES\d{22}$/'],
            'valoracion' => 'required|in:PR,OR,PL,ST,BA',
        ], [
            'edad.required' => 'La edad es obligatoria.',
            'edad.min'      => 'Debes ser mayor de edad.',
            'iban.required' => 'El IBAN es obligatorio.',
            'iban.regex'    => 'El IBAN debe tener el formato ES seguido de 22 números.',
            'valoracion.required' => 'Por favor, selecciona una valoración.',
        ]);
    
        try {
            // 2. Creamos el registro
            $donante = new Donante();
            $donante->usuario_id = auth()->id(); 
            $donante->edad = $request->input('edad');
            $donante->iban = $request->input('iban');
            $donante->valoracion = $request->input('valoracion');
            $donante->save();
    
            // 3. Redirigimos al dashboard con mensaje de ÉXITO
            return redirect()->route('dashboard')->with('exito', '¡Donación realizada correctamente! Muchas gracias.');
    
        } catch (\Exception $e) {
            // Si hay un error de base de datos, volvemos atrás con el error
            return back()->withInput()->withErrors(['error' => 'No se pudo guardar la donación: ' . $e->getMessage()]);
        }
    }


    public function formularioPublico()
    {
        return view('donantes.create', [
            'donante' => new Donante(),
            'usuarios' => [], 
            'valoraciones' => Donante::$valoraciones,
            'oper' => 'publico', // Esto nos servirá para saber que es la vista de usuario
            'disabled' => '',
            'datos' => ['exito' => '']
        ]);
    }
    }