<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        return view('usuarios.planes'); 
    }
}
//Ejemplo de Modelo-Vista-Controllador