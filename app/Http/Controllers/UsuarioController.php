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
}}