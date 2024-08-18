<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.index');
    // return view('dashboard');
})->name('raiz');

// formulario para iniciar sesión
Route::get('/login', [UserController::class, 'formularioLogin'])->name('usuario.login');

// Envia los datos para verificar si el usuario es válido
Route::post('/login', [UserController::class, 'login'])->name('usuario.validar');

// Cerrar Sesión
Route::post('/logout', [UserController::class, 'logout'])->name('usuario.logout');

// Ruta para crear usuario
Route::get('/users/register', [UserController::class, 'formularioNuevo'])->name('usuario.registrar');
Route::post('/users/register', [UserController::class, 'registrar'])->name('usuario.registrar');

Route::get('/backoffice', function() {
    $user = Auth::user();
    
    if($user == NULL) {
        return redirect()->route('usuario.login')->withErrors(['message' => 'No existe una sesión activa.']);
    }

    return view('backoffice.dashboard', compact('user'));
})->name('backoffice.dashboard');