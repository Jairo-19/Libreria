<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;


//============RUTAS DE LA PAGINA PRINCIPAL============== ///
// Ruta para la página de inicio
Route::get('/', function () {return view('pagina.home');})->name('home');

//ruta para la pagina de libros
Route::get('/libros', function () {return view('pagina.libros');})->name('libros');

//ruta para la pagina de contacto
Route::get('/contacto', function () {return view('pagina.contacto');})->name('contacto');

//============RUTAS DE LOGIN Y REGISTRO==============
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::get('/registro', [RegistroController::class, 'index'])->name('registro');
Route::post('/registro', [RegistroController::class, 'store'])->name('registro.store');

//============RUTAS DE ADMINISTRACION============== //








//============RUTAS DE LA API============== //