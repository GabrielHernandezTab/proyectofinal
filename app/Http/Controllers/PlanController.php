<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        return view('usuarios.planes'); 
    }

//Ejemplo de Modelo-Vista-Controllador

public function basico()
        {
            return view('cursos.basico'); 
        }
public function avanzado()
        {
            return view('cursos.avanzado'); 
        }

public function supremo()
        {
            return view('cursos.supremo'); 
        }



}