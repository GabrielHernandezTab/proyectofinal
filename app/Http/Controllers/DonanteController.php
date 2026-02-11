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
                    'importe'      => 'required|numeric|min:1|max:300',
                    'iban'      => ['required', 'regex:/^ES\d{22}$/'],
                    'valoracion' => 'required|in:PR,OR,PL,ST,BA',               
                ], 
                [
                    'edad.required'   => 'La edad es obligatoria.',
                    'edad.min'        => 'El donante debe ser mayor de edad.',
                    'importe.required' => 'Debe especificar un importe deseado.',
                    'iban.regex'      => 'El IBAN debe ser ES + 22 dígitos.',
                     'iban.required'      => 'El IBAN es obligatorio.',
                     'valoracion.required'      => 'La valoración es obligatoria.'
                ]);
    
                $donante->usuario_id = $request->input('usuario_id');
                $donante->edad = $request->input('edad');
                $donante->importe = $request->input('importe');
                $donante->valoracion = $request->input('valoracion');
                $donante->iban = $request->input('iban');
                $donante->save();
    
                $datos['exito'] = '¡Donante dado de alta!';
                $disabled = 'disabled';
            } catch (\Illuminate\Validation\ValidationException $e) {
                // AQUÍ MANTENEMOS TUS ERRORES PARA EL MODAL
                if ($request->input('modo') == 'ajax') {
                    return view('donantes.create', [
                        'donante' => $donante, 'datos' => $datos, 'disabled' => $disabled,
                        'valoraciones' => $valoraciones, 'usuarios'=> $usuarios, 'oper' => $oper
                    ])->withErrors($e->validator)->render();
                }
                throw $e;
            }
        }
    
        if ($request->input('modo') == 'ajax') {
            return view('donantes.create', compact('donante', 'datos', 'disabled', 'valoraciones', 'usuarios', 'oper'))->render();
        }
        return view('donantes.create', compact('donante', 'datos', 'disabled', 'valoraciones', 'usuarios', 'oper'));
    }

    public function edit(Request $request, string $id = '')
    {
        $id_Donante = $id ?: $request->input('id_actual');
        $donante = Donante::find($id_Donante);
        $usuarios = Usuario::all(); 
        $valoraciones = Donante::$valoraciones;
        $datos = ['exito' => ''];
        $disabled = '';
        $oper = "edit"; 
    
        if ($request->isMethod('post')) {   
            try {
                $request->validate([
                    'usuario_id' => 'required|exists:usuarios,id',
                    'valoracion' => 'required|in:PR,OR,PL,ST,BA',
                    'edad'      => 'required|numeric|min:18|max:120',
                    'importe'      => 'required|numeric|min:1|max:300',
                    'iban'      => ['required', 'regex:/^ES\d{22}$/'],
                     'valoracion.required'      => 'La valoración es obligatoria.'

                ], 
                [
                    'edad.required'   => 'La edad es obligatoria.',
                    'edad.min'        => 'El donante debe ser mayor de edad.',
                    'importe.required' => 'Debe especificar un importe deseado.',
                    'iban.regex'      => 'El IBAN debe ser ES + 22 dígitos.',
                     'iban.required'      => 'El IBAN es obligatorio.',
                     'valoracion.required'      => 'La valoración es obligatoria.'

                ]);
    
                $donante->usuario_id = $request->input('usuario_id');
                $donante->edad = $request->input('edad');
                $donante->importe = $request->input('importe');
                $donante->valoracion = $request->input('valoracion');
                $donante->iban = $request->input('iban');
                $donante->save();   
                
                $datos['exito'] = 'Operación realizada correctamente';
                $disabled = 'disabled';
            } catch (\Illuminate\Validation\ValidationException $e) {
                // MANTENEMOS TUS ERRORES EN LA EDICIÓN
                if ($request->input('modo') == 'ajax') {
                    return view('donantes.create', [
                        'donante' => $donante, 'datos' => $datos, 'disabled' => $disabled,
                        'valoraciones' => $valoraciones, 'usuarios' => $usuarios, 'oper' => $oper
                    ])->withErrors($e->validator)->render();
                }
                throw $e;
            }
        }
    
        $vars = compact('donante', 'datos', 'valoraciones', 'disabled', 'usuarios', 'oper');
        return ($request->input('modo') == 'ajax') ? view('donantes.create', $vars)->render() : view('donantes.create', $vars);
    }

    public function destroy(Request $request, string $id = '')
    {
        $id_Donante = $id ?: $request->input('id_actual');
        $donante = Donante::find($id_Donante);
        $usuarios = Usuario::all(); 
        $valoraciones = Donante::$valoraciones;
        $datos = ['exito' => ''];
        $oper = "destroy"; 
    
        if ($request->isMethod('post')) {
            if ($donante) { $donante->delete(); }
            $datos['exito'] = 'Donante eliminado correctamente';
            
            return view('donantes.create', [
                'donante' => new Donante(), 'valoraciones' => $valoraciones, 
                'usuarios' => $usuarios, 'oper' => 'create', 
                'disabled' => 'disabled', 'datos' => $datos
            ])->render();
        }
    
        return view('donantes.create', [
            'donante' => $donante, 'valoraciones' => $valoraciones, 
            'usuarios' => $usuarios, 'oper' => $oper, 
            'disabled' => 'disabled', 'datos' => $datos
        ]);
    }

    public function show(string $id, Request $request)
    {
        $donante = Donante::find($id);
        $usuarios = Usuario::all(); 
        $valoraciones = Donante::$valoraciones;
        $vars = [
            'donante' => $donante, 'datos' => ['exito' => ''], 
            'valoraciones' => $valoraciones, 'usuarios' => $usuarios, 
            'disabled' => 'disabled', 'oper' => 'show'
        ];
        return ($request->input('modo') == 'ajax') ? view('donantes.create', $vars)->render() : view('donantes.create', $vars);
    }






    public function realizarDonacion(Request $request)
    {
        $request->validate([
            'edad'       => 'required|numeric|min:18|max:120',
            'importe'    => 'required|numeric|min:1|max:300',
            'iban'       => ['required', 'regex:/^ES\d{22}$/'],
            'valoracion' => 'required|in:PR,OR,PL,ST,BA',
        ],
        [
            'edad.required'   => 'La edad es obligatoria.',
            'edad.min'        => 'El donante debe ser mayor de edad.',
            'importe.required' => 'Debe especificar un importe deseado.',
            'iban.regex'      => 'El IBAN debe ser ES + 22 dígitos.',
            'iban.required'      => 'El IBAN es obligatorio.',
             'valoracion.required'      => 'La valoración es obligatoria.'

        ]);

        try {
            // 1. Obtenemos el ID de quien está logueado
            $idLogueado = auth()->id();

            // 2. Buscamos a ese usuario exclusivamente en TU tabla 'usuarios'
            $miUsuario = \App\Models\Usuario::find($idLogueado);

            // 3. Si por algún motivo no estuviera en tu tabla personalizada, lo insertamos
            // usando los datos de la sesión para que la base de datos no rechace la donación
            if (!$miUsuario) {
                $miUsuario = new \App\Models\Usuario();
                $miUsuario->id = $idLogueado;
                // IMPORTANTE: Aquí sacamos el nombre del objeto de sesión para meterlo en TU columna 'nombre'
                $miUsuario->nombre = auth()->user()->name; 
                $miUsuario->email = auth()->user()->email;
                $miUsuario->password = 'sin_password'; // O cualquier valor, ya que no se usará para loguear
                $miUsuario->save();
            }

            // 4. Creamos la donación vinculada a TU usuario
            $donante = new Donante();
            $donante->usuario_id = $miUsuario->id; 
            $donante->edad = $request->input('edad');
            $donante->importe = $request->input('importe');
            $donante->iban = $request->input('iban');
            $donante->valoracion = $request->input('valoracion');
            $donante->save();

            // 5. Respuesta para que el AJAX muestre el mensaje verde
            if ($request->input('modo') == 'ajax') {
                return view('donantes.create', [
                    'donante' => new Donante(), 
                    'usuarios' => [],
                    'valoraciones' => Donante::$valoraciones,
                    'oper' => 'publico',
                    'disabled' => 'disabled',
                    'datos' => ['exito' => '¡Donación realizada correctamente!']
                ])->render();
            }

            return redirect()->route('dashboard')->with('exito', '¡Donación realizada correctamente!');

        } catch (\Exception $e) {
            return '<div class="alert alert-danger">Error crítico: ' . $e->getMessage() . '</div>';
        }
    }


    public function formularioPublico()
    {
        return view('donantes.create', [
            'donante' => new Donante(),
            'usuarios' => [], 
            'valoraciones' => Donante::$valoraciones,
            'oper' => 'publico',
            'disabled' => '',
            'datos' => ['exito' => '']
        ]);
    }
}