<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

use App\Http\Controllers\Datos;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProfileController; 

use App\Http\Controllers\PlanController; 


Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/admin', function () {
return view('dashboard');
})->middleware('auth');

Route::get('/dashboard/usuarios', function () {
return view('usuario');
})->middleware('auth');

Route::get('/planes', [PlanController::class, 'index'])
    ->name('usuarios.planes')   // 👈 Este nombre debe coincidir con tu Blade
    ->middleware(['auth']);




Route::post('/procesar-datos', [Datos::class, 'procesar']);



Route::get('/procesar-datos', [Datos::class, 'procesar']);


Route::get('/usuario', [UsuarioController::class, 'index']);
//Route::get('/usuario/{id}', [UsuarioController::class, 'show'])->name('usuario.show');


Route::get('/usuario/store', [UsuarioController::class, 'store'])->name('usuario.store');



// Solo usuarios logueados Y que sean 'admin' pueden entrar
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard/usuario', [UsuarioController::class, 'index'])->name('usuarios.index');
});


/*
// Solo usuarios logueados Y que sean 'admin' pueden entrar
Route::middleware(['auth', 'role:admin'])->group(function () {
    
    Route::get('/libro', [LibroController::class, 'index'])->name('libro.index');
    Route::get('/libro/create', [LibroController::class, 'create'])->name('libro.create');
    Route::post('/libro/create', [LibroController::class, 'create']);
    Route::get('/libro/edit/{id}', [LibroController::class, 'edit'])->name('libro.edit');
    Route::post('/libro/edit', [LibroController::class, 'edit']);
    Route::get('/libro/show/{id}', [LibroController::class, 'show'])->name('libro.show');
    Route::get('/libro/destroy/{id}', [LibroController::class, 'destroy'])->name('libro.destroy');
    Route::post('/libro/destroy', [LibroController::class, 'destroy']);
    
});
*/

/*

Los roles se gestionan con middlewares aquí en las rutas
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Otras rutas protegidas para administradores
});

Esa sería un ruta protegida para administradores únicamente, un ejemplo.


Los permisos al contrario se gestionan en los controladores con:
$this->authorize('permission-name');
Ejemplo para el LibroController:
    public function create()
    {
        $this->authorize('create-libro');

        // Lógica para mostrar el formulario de creación de libro
    }

Y así en cada método que queramos proteger con permisos específicos.

También se pueden poner en las rutas con middlewares personalizados para permisos, pero es más común hacerlo en los controladores.
También se pueden poner en views con directivas blade @can y @cannot


*/