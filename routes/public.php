<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ActivationController;
use App\Http\Controllers\DatosController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\ElementosController;
use App\Http\Controllers\DireccionesController;
use App\Http\Controllers\TrimestresController;
use App\Http\Controllers\EvidenciasController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CobranzaController;
use App\Http\Controllers\CarteraController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\ContratosController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\CatalogosController;
use App\Http\Controllers\SeguridadController;
use App\Http\Controllers\Promocion;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\VistasController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
//Rutas inicio
//Route::get('/admin/inicio', [InicioController::class, 'index'])->name('inicioadmin')->middleware('auth');

//HOLA JEJE :)

//Ruta para cargar el inicio del administrador
Route::get('/admin/inicio', [InicioController::class, 'mostrarPublicacionesRecientes'])->name('inicioadmin')->middleware('auth', 'admin');

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

Route::get('/error', function() {
    return view('layouts.error');
})->name('error');


//Rutas para el registro
Route::get('/registro', function() {
    return view('layouts.registro');
})->name('registro');

Route::post('/registro', [RegistroController::class, 'registro'])->middleware('auth', 'admin');

//Ruta exito
Route::get('/exito', function() {
    return view('layouts.exito');
})->name('exito')->middleware('auth', 'admin');

//Ruta para validación de correo
Route::get('/activate/{token}', [ActivationController::class, 'activate'])->name('activate')->middleware('auth', 'admin');

//Ruta para publicaciones
Route::prefix('admin')->group(function () {
    Route::resource('publicaciones', PublicacionController::class);
})->middleware('auth', 'admin');

Route::get('/admin/mostrarpublicaciones', [PublicacionController::class, 'mostrarTodasPublicaciones'])->name('mostrarpublis')->middleware('auth', 'admin');

//Ruta para elementos
Route::get('/admin/elementos', [ElementosController::class, 'index'])->name('elementos')->middleware('auth', 'admin');

Route::get('admin/direcciones/trimestres/elementos/{iddireccion}/{idtrimestre}', [ElementosController::class, 'mostrarElementos'])->name('elementos2')->middleware('auth', 'admin');


//Route::get('/admin/elementos/asignar/{numelemento}', [ElementosController::class, 'indexAsignarElemento'])->name('elementos.asignar')->middleware('auth');

//Route::post('/elementos/asignar', [ElementosController::class, 'asignarElemento'])->name('elementos.asignar.funcion');

//Rutas para direcciones
Route::get('/admin/direcciones', [DireccionesController::class, 'index'])->name('direcciones')->middleware('auth', 'admin');

//Rutas para trimestres
Route::get('/admin/direcciones/trimestres/{iddireccion}', [TrimestresController::class, 'index'])->name('trimestres')->middleware('auth', 'admin');


// Ruta para la vista de evidencias (pasando iddireccion, idtrimestre e idelemento)
Route::get('admin/evidencias/{iddireccion}/{idtrimestre}/{idelemento}', [EvidenciasController::class, 'mostrarEvidencias'])->name('evidencias')->middleware('auth', 'admin');

//Ruta para agregar comentario
Route::post('admin/comentario/{id}', [ComentarioController::class, 'storeOrUpdate'])->name('comentario.storeOrUpdate')->middleware('auth', 'admin');

//Ruta para denegar acceso a usuario común
Route::get('/accesodenegado', function() {
    return view('usuario.denegar');
})->name('denegar')->middleware('auth');

//Ruta para chatgpt
//Route::get('/admin/chat', [EvidenciasController::class, 'mostrarChat'])->name('chat')->middleware('auth');

Route::get('admin/chat', function () {
    return view('layouts.noticiasadmin');
})->name('chat.index');

Route::post('/chat/ask', [ChatController::class, 'ask'])->name('chat.ask')->middleware('auth', 'admin');


// AQUI COMIENZAN LAS RUTAS DE USUARIO COMÚN


Route::get('/inicio', [InicioController::class, 'mostrarInicio'])->name('inicio')->middleware('auth');
//Rutas de Promocion

Route::get('/promocion', [PromocionController::class, 'mostrarPromocion'])->name('promocion')->middleware('auth');

//Rutas cobranza 
Route::get('/cobranza', [CobranzaController::class, 'mostrarCobranza'])->name('cobranza')->middleware('auth');

//Rutas cartera
Route::get('/cartera', [CarteraController::class, 'mostrarCartera'])->name('cartera')->middleware('auth');

//Rutas pagos
Route::get('/pagos', [PagosController::class, 'mostrarPagos'])->name('pagos')->middleware('auth');

//Rutas contratos
Route::get('/contratos', [ContratosController::class, 'mostrarContratos'])->name('contratos')->middleware('auth');

//Rutas seguimiento
Route::get('/seguimiento', [SeguimientoController::class, 'mostrarSeguimiento'])->name('seguimiento')->middleware('auth');

//Rutas catalogos
Route::get('/catalogos', [CatalogosController::class, 'mostrarCatalogos'])->name('catalogos')->middleware('auth');

//Rutas seguridad
Route::get('/seguridad', [SeguridadController::class, 'mostrarSeguridad'])->name('seguridad')->middleware('auth');










Route::get('/mostrarpublicaciones', [PublicacionController::class, 'mostrarTodasPublicaciones2'])->name('mostrarpublis2')->middleware('auth');
//Ruta para mostrar los trimestres 
Route::get('/trimestreu', [TrimestresController::class, 'index2'])->name('trimestreu')->middleware('auth');

//Ruta para mostrar elementos del usuario dependiendo de la direccion y el trimestre
Route::get('/trimestres/elementos/{iddireccion}/{idtrimestre}', [ElementosController::class, 'mostrarElementos2'])->name('elementosu')->middleware('auth');


//Route::get('usuario/direcciones/trimestres/elementos/{iddireccion}/{idtrimestre}', [ElementosController::class, 'mostrarElementos'])->name('elementosu2');

//Ruta para mostrar evidencias de usuario
Route::get('evidencias/{iddireccion}/{idtrimestre}/{idelemento}', [EvidenciasController::class, 'mostrarEvidencias2'])->name('evidenciasu')->middleware('auth');

//Ruta para agregar comentario de usuario
Route::post('/comentario/{id}', [ComentarioController::class, 'storeOrUpdate2'])->name('comentario.storeOrUpdate2')->middleware('auth');

//Ruta para agregar evidencia
Route::post('/nuevaevidencia/{iddireccion}/{idtrimestre}/{idelemento}', [EvidenciasController::class, 'agregarEvidencia'])->name('agregarevidencia')->middleware('auth');

//Ruta de acerca de
Route::get('/acercade', function() {
    return view('layouts.acercade');
})->name('acercade');

//Ruta de noticias
Route::get('/noticias', function() {
    return view('layouts.noticias');
})->name('noticias');

//Ruta para crear noticias
Route::get('/noticias-admin', function() {
    return view('layouts.noticiasadmin');
})->name('noticiasadmin');

//Ruta para bitacoras
Route::get('/bitacoras', [BitacoraController::class, 'index'])->name('bitacoras');
Route::get('/bitacoras/create', [BitacoraController::class, 'create'])->name('bitacoras.create');
Route::post('/bitacoras/create/c', [BitacoraController::class, 'store'])->name('bitacoras.store');

//Rutas para equipos
Route::get('/equipos', [BitacoraController::class, 'index2'])->name('equipos');
Route::get('/equipos/create', [BitacoraController::class, 'create2'])->name('equipos.create');
Route::post('/equipos/create/c', [BitacoraController::class, 'store2'])->name('equipos.store');
?>