<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DonanteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\Datos;
use App\Http\Controllers\PlanController;

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => view('welcome'))->name('welcome');
Route::get('/planes', [PlanController::class, 'index'])->name('planes');

/*
|--------------------------------------------------------------------------
| RUTAS PARA USUARIOS AUTENTICADOS
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- SECCIÓN: REALIZAR DONACIÓN ---
    Route::get('/realizar-donacion', [DonanteController::class, 'formularioPublico'])->name('donacion.formulario');
    Route::post('/realizar-donacion', [DonanteController::class, 'realizarDonacion'])->name('donacion.store');
    
    // Ver planes (usuario normal)
    Route::get('/mis-planes', [PlanController::class, 'index'])->name('usuarios.planes');



});

/*
|--------------------------------------------------------------------------
| RUTAS PARA ADMINISTRADORES (Role: admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {

    // 1. GESTIÓN DE CURSOS (Cambiado el nombre para que funcione tu menú)
    Route::get('/admin/gestion-cursos', [CursoController::class, 'index'])->name('cursos.index');
    Route::match(['get', 'post'], '/curso/create', [CursoController::class, 'create']);
    Route::match(['get', 'post'], '/curso/show/{id?}', [CursoController::class, 'show']);
    Route::match(['get', 'post'], '/curso/edit/{id?}', [CursoController::class, 'edit']);
    Route::match(['get', 'post'], '/curso/destroy/{id?}', [CursoController::class, 'destroy']);

    // 2. GESTIÓN DE DONANTES
    Route::get('/admin/donantes', [DonanteController::class, 'index'])->name('admin.donantes.index');
    Route::match(['get', 'post'], '/donante/create', [DonanteController::class, 'create'])->name('donantes.create');
    Route::match(['get', 'post'], '/donante/show/{id?}', [DonanteController::class, 'show'])->name('donantes.show');
    Route::match(['get', 'post'], '/donante/edit/{id?}', [DonanteController::class, 'edit'])->name('donantes.edit');
    Route::match(['get', 'post'], '/donante/destroy/{id?}', [DonanteController::class, 'destroy'])->name('donantes.destroy');

    // 3. GESTIÓN DE USUARIOS
    Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::match(['get', 'post'], '/usuario/{oper}/{id?}', [UsuarioController::class, 'operacion']);

    // 4. GESTIÓN DE ADMINISTRADORES
    Route::get('/admin/administradores', [AdministradorController::class, 'index'])->name('administradores.index');
    Route::match(['get', 'post'], '/administrador/{oper}/{id?}', [AdministradorController::class, 'operacion']);

});

/* --- OTRAS RUTAS --- */
Route::post('/procesar-datos', [Datos::class, 'procesar']);

require __DIR__.'/auth.php';