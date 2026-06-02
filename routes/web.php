<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;


//============RUTAS DE LA PAGINA PRINCIPAL============== ///
// Ruta para la página de inicio
Route::get('/', function () {return view('pagina.home');})->name('home');

//ruta para la pagina de libros
Route::get('/libros', function () {return view('pagina.libros');})->name('libros');

//ruta para la pagina de contacto
Route::get('/contacto', function () {return view('pagina.contacto');})->name('contacto');





//============RUTAS DE ADMINISTRACION============== //








//============RUTAS DE LA API============== //