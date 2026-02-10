<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::paginate(10);
        return view('cursos.index', ['cursos' => $cursos, 'titulo' => Curso::$titulos]);
    }

    public function create(Request $request) {
        $curso = new Curso();
        $datos = ['exito' => ''];
        $disabled = '';
        $titulos = Curso::$titulos;
        $oper = 'create';
    
        if ($request->isMethod('post')) {
            try {
            $request->validate([
                'titulo' => 'required|in:GR,AV,SP',
                'descripcion'    => ['required', 'string', 'min:3', 'regex:/^[A-Z]/'],
                'precio'      => 'required|numeric|min:0|max:120',
                'horas'      => 'required|numeric|min:0|max:300',
            ],
            [
                'descripcion.regex' => 'La descripcion debe comenzar por una letra mayúscula.',
                'nombre.required' => 'La descripcion es obligatoria.',
                'precio.required'   => 'El precio es obligatoria.',
                'precio.numeric'    => 'El precio debe ser un número.',
                'titulo.required' => 'El titulo es obligatorio.',
                'horas.required'   => 'Las horas son obligatorias.',
                'horas.numeric'    => 'Las horas deben ser un número.',

            ]);
    
            $curso->titulo    = $request->input('titulo');
            $curso->descripcion       = $request->input('descripcion');
            $curso->precio      = $request->input('precio');
            $curso->horas = $request->input('horas');
            $curso->save();
    
            $datos['exito'] = '¡Curso dado de alta!';
            $disabled = 'disabled';
            } catch (\Illuminate\Validation\ValidationException $e) {
                // Si hay error de validación, volvemos a enviar la vista con los errores
            if ($request->input('modo') == 'ajax') {
                return view('cursos.create', [
                    'curso' => $curso,
                    'datos' => $datos,
                    'disabled' => $disabled,
                    'titulos' => $titulos,
                    'oper' => $oper
                ])->withErrors($e->validator)->render();
            }
        }
        }
    
        $titulos = Curso::$titulos;
        if ($request->input('modo') == 'ajax') {
            return view('cursos.create', compact('curso', 'datos', 'disabled', 'titulos'))->with('oper', 'create')->render();
        }
        return view('cursos.create', compact('curso', 'datos', 'disabled', 'titulos'))->with('oper', 'create');
    }

    public function show(string $id, Request $request)
    {
        $curso = Curso::find($id);
        $titulos = Curso::$titulos;
        $datos = ['exito' => ''];

        if ($request->input('modo') == 'ajax') {
            return view('cursos.create', ['curso' => $curso, 'datos' => $datos, 'titulos' => $titulos, 'disabled' => 'disabled', 'oper' => 'show'])->render();
        }
        return view('cursos.create', ['curso' => $curso, 'datos' => $datos, 'titulos' => $titulos, 'disabled' => 'disabled', 'oper' => 'show']);
    }

    public function edit(Request $request, string $id = '')
    {
        
        $id_Curso = $id ?: $request->input('id_actual');
        $curso = Curso::find($id_Curso);
        $titulos = Curso::$titulos;
        $datos = ['exito' => ''];
        $disabled = '';
        $oper = 'edit';

        if ($request->isMethod('post')) {   
            try {
                $request->validate([
                    'titulo' => 'required|in:GR,AV,SP',
                    'descripcion'    => ['required', 'string', 'min:3', 'regex:/^[A-Z]/'],
                    'precio'      => 'required|numeric|min:0|max:120',
                    'horas'      => 'required|numeric|min:0|max:300',
                ],
                [
                    'descripcion.regex' => 'La descripcion debe comenzar por una letra mayúscula.',
                    'nombre.required' => 'La descripcion es obligatoria.',
                    'precio.required'   => 'El precio es obligatoria.',
                    'precio.numeric'    => 'El precio debe ser un número.',
                    'titulo.required' => 'El titulo es obligatorio.',
                    'horas.required'   => 'Las horas son obligatorias.',
                    'horas.numeric'    => 'Las horas deben ser un número.',
    
                ]);
        
                $curso->titulo    = $request->input('titulo');
                $curso->descripcion       = $request->input('descripcion');
                $curso->precio      = $request->input('precio');
                $curso->horas = $request->input('horas');
                $curso->save();  
            
            $datos['exito'] = 'Operación realizada correctamente';
            $disabled = 'disabled';
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Si falla la validación en AJAX, devolvemos la vista con los errores
            if ($request->input('modo') == 'ajax') {
                return view('cursos.create', [
                    'curso' => $curso,
                    'datos' => $datos,
                    'disabled' => $disabled,
                    'titulos' => $titulos,
                    'oper' => $oper
                ])->withErrors($e->validator)->render();
            }
        }
    }

        if ($request->input('modo') == 'ajax') {
            return view('cursos.create', compact('curso', 'datos', 'titulos', 'disabled'))->with('oper', 'edit')->render();
        }
        return view('cursos.create', compact('curso', 'datos', 'titulos', 'disabled'))->with('oper', 'edit');
    
    }
    

    public function destroy(Request $request, string $id = '')
    {
        $id_Curso = $id ?: $request->input('id_actual');
        $curso = Curso::find($id_Curso);
        $titulos = Curso::$titulos;

        if ($request->isMethod('post')) {
            if ($curso) { $curso->delete(); }
            $datos = ['exito' => 'Operación realizada con éxito'];
            return view('cursos.create', ['curso' => new Curso(), 'titulos' => $titulos, 'oper' => 'destroy', 'disabled' => 'disabled', 'datos' => $datos])->render();
        }

        return view('cursos.create', ['curso' => $curso, 'titulos' => $titulos, 'oper' => 'destroy', 'disabled' => 'disabled', 'datos' => ['exito' => '']]);
    }
}