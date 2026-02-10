<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DonanteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\Datos;

/* --- RUTAS PÚBLICAS --- */
Route::get('/', fn() => view('welcome'))->name('welcome');
Route::get('/planes', fn() => view('planes'))->name('planes');

/* --- RUTAS USUARIOS AUTENTICADOS --- */
Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    // Perfil
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // DONAR (Estructura AJAX: un solo método para mostrar y guardar)
    Route::match(['get', 'post'], '/donar', [DonanteController::class, 'create'])->name('donantes.create');

    // CURSOS (Solo ver lista)
    Route::get('/ver-cursos', [CursoController::class, 'index'])->name('cursos.index');
});

/* --- SECCIÓN CURSOS (Admin) --- */
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/ver-cursos', [CursoController::class, 'index'])->name('cursos.index');
    Route::match(['get', 'post'], '/curso/create', [CursoController::class, 'create']);
    Route::match(['get', 'post'], '/curso/show/{id}', [CursoController::class, 'show']);
    Route::match(['get', 'post'], '/curso/edit/{id}', [CursoController::class, 'edit']);
    Route::match(['get', 'post'], '/curso/destroy/{id}', [CursoController::class, 'destroy']);

    /* --- SECCIÓN DONANTES (Admin) --- */
    Route::get('/admin/donantes', [DonanteController::class, 'index'])->name('admin.donantes.index');
    // Si necesitas borrar donaciones desde la tabla:
    Route::match(['get', 'post'], '/donante/destroy/{id}', [DonanteController::class, 'destroy']);
});

/* --- RUTAS ADMINISTRADORES (Middleware Spatie) --- */
Route::middleware(['auth', 'role:admin'])->group(function () {

    // 1. Usuarios (Basado en tu estructura AJAX)
    Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::match(['get', 'post'], '/usuario/{oper}/{id?}', [UsuarioController::class, 'operacion']);

    // 2. Administradores
    Route::get('/admin/administradores', [AdministradorController::class, 'index'])->name('administradores.index');
    Route::match(['get', 'post'], '/administrador/{oper}/{id?}', [AdministradorController::class, 'operacion']);

    // 3. Cursos (Gestión completa con AJAX)
    // Sustituimos el Resource por tu ruta de "operacion" para que funcione el modal
    Route::get('/admin/gestion-cursos', [CursoController::class, 'index'])->name('admin.cursos.index');
    Route::match(['get', 'post'], '/curso/{oper}/{id?}', [CursoController::class, 'operacion']);

    // 4. Donantes (Ver listado)
    Route::get('/admin/donantes', [DonanteController::class, 'index'])->name('admin.donantes.index');
});

Route::post('/procesar-datos', [Datos::class, 'procesar']);
require __DIR__.'/auth.php';