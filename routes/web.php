<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Models\Libro;


//============RUTAS DE LA PAGINA PRINCIPAL============== ///
// Ruta para la página de inicio
Route::get('/', function () {return view('pagina.home');})->name('home');

//ruta para la pagina de libros (muestra catálogo desde BD)
Route::get('/libros', function () {
    $libros = Libro::all();
    return view('pagina.libros', compact('libros'));
})->name('libros');

//ruta para importar libros aleatorios desde Open Library via Postman
Route::get('/importar/{query?}', function (?string $query = null) {
    if ($query) {
        Artisan::call("libros:importar", ['query' => $query]);
    } else {
        Artisan::call("libros:importar");
    }
    return response()->json(['message' => nl2br(Artisan::output())]);
});

//ruta para la pagina de contacto
Route::get('/contacto', function () {return view('pagina.contacto');})->name('contacto');

//============RUTAS DE LOGIN Y REGISTRO==============
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::get('/registro', [RegistroController::class, 'index'])->name('registro');
Route::post('/registro', [RegistroController::class, 'store'])->name('registro.store');

//============RUTAS DE ADMINISTRACION============== //








//============RUTAS DE LA API============== //