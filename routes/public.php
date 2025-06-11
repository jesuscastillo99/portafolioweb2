<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\SobremiController;
use App\Http\Controllers\PortafolioController;
use App\Http\Controllers\EducacionController;
use App\Http\Controllers\HabilidadesController;
use App\Http\Controllers\ContactoController;


use Illuminate\Support\Facades\Auth;
//Rutas inicio
//Route::get('/admin/inicio', [InicioController::class, 'index'])->name('inicioadmin')->middleware('auth');

//Ruta para cargar el login
Route::get('/login', function() {
    return view('layouts.login');
})->name('login')->middleware('guest');

// //Ruta para iniciar sesión ya sea administrador o usuario común
Route::post('/login', [LoginController::class, 'login'])->name('login2');

// //Rutas logout
Route::get('/logout', function() {
     return view('layouts.login'); })->name('logout');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout2');



// AQUI COMIENZAN LAS RUTAS DE USUARIO COMÚN


Route::get('/inicio', [InicioController::class, 'mostrarInicio'])->name('inicio')->middleware('auth');

//Rutas sobremi
Route::get('/sobremi', [SobremiController::class, 'mostrarSobremi'])->name('sobremi')->middleware('auth');

//Rutas portafolio
Route::get('/portafolio', [PortafolioController::class, 'mostrarPortafolio'])->name('portafolio')->middleware('auth');

//Rutas educacion
Route::get('/educacion', [EducacionController::class, 'mostrarEducacion'])->name('educacion')->middleware('auth');

//Rutas habilidades
Route::get('/habilidades', [HabilidadesController::class, 'mostrarHabilidades'])->name('habilidades')->middleware('auth');

//Rutas contacto
Route::get('/contacto', [ContactoController::class, 'mostrarContacto'])->name('contacto')->middleware('auth');
?>