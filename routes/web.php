<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\LibroController;
use App\Models\Libro;
use App\Services\OpenLibraryService;


//============RUTAS DE LA PAGINA PRINCIPAL============== ///
// Ruta para la página de inicio
Route::get('/', App\Http\Controllers\HomeController::class)->name('home');

//ruta para la pagina de libros (muestra catálogo desde BD)
Route::get('/libros', [LibroController::class, 'index'])->name('libros');

//ruta para la pagina de detalle del libro
Route::get('/producto/{libro}', [LibroController::class, 'show'])->name('producto.show');

//ruta para la pagina de contacto
Route::get('/contacto', function () {return view('pagina.contacto');})->name('contacto');

//============RUTAS DE USUARIO============== ///
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito');
Route::get('/carrito/resumen', [CarritoController::class, 'resumen'])->name('carrito.resumen');
Route::post('/carrito/agregar/{libro}', [CarritoController::class, 'add'])->name('carrito.agregar');
Route::post('/carrito/eliminar/{carrito}', [CarritoController::class, 'destroy'])->name('carrito.eliminar');
Route::post('/carrito/cantidad/{carrito}/{action}', [CarritoController::class, 'updateQuantity'])->name('carrito.cantidad');

Route::get('/lista-deseos', function () {
    return view('pagina.lista-deseos');
})->name('lista-deseos');

Route::get('/perfil', function () {
    return view('pagina.perfil');
})->name('perfil');

Route::get('/ajustes', function () {
    return view('pagina.ajustes');
})->name('ajustes');

//============RUTAS DE LA API============== ///

//ruta para importar libros desde Open Library via Postman
Route::get('/importar/{query?}', function (?string $query = null) {
    try {
        $service = app(OpenLibraryService::class);
        $items = $query ? $service->buscarLibros($query, 40) : $service->librosAleatorios(40);

        if (empty($items)) {
            return response()->json(['success' => false, 'error' => 'No se encontraron resultados'], 404);
        }

        $insertados = 0;
        foreach ($items as $doc) {
            $openLibraryId = $doc['key'] ?? null;
            if (!$openLibraryId) continue;

            $coverId = $doc['cover_i'] ?? null;

            $descuentos = [0, 0, 0, 0, 5, 5, 10, 10, 15, 20, 25, 30];

            Libro::updateOrCreate(
                ['open_library_id' => $openLibraryId],
                [
                    'titulo' => $doc['title'] ?? 'Sin título',
                    'descripcion' => null,
                    'precio' => mt_rand(599, 4999) / 100,
                    'descuento' => $descuentos[array_rand($descuentos)],
                    'stock' => mt_rand(5, 100),
                    'activo' => true,
                    'isbn_13' => $doc['isbn'][0] ?? null,
                    'imagen' => $coverId ? $service->obtenerPortada($coverId) : null,
                    'editorial' => $doc['publisher'][0] ?? null,
                    'anio' => $doc['first_publish_year'] ?? null,
                    'idioma' => $doc['language'][0] ?? null,
                    'num_paginas' => $doc['number_of_pages_median'] ?? null,
                ]
            );
            $insertados++;
        }

        return response()->json([
            'success' => true,
            'importados' => $insertados,
            'total_bd' => Libro::count(),
        ]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    }
});



//============RUTAS DE LOGIN Y REGISTRO==============
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/registro', [RegistroController::class, 'index'])->name('registro');
Route::post('/registro', [RegistroController::class, 'store'])->name('registro.store');

//============RUTAS DE ADMINISTRACION============== //







