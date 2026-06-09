<?php

namespace App\Http\Controllers;

use App\Models\Libro;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::where('stock', '>', 0)->where('activo', true)->get();
        return view('pagina.libros', compact('libros'));
    }

    public function show(Libro $libro)
    {
        $libro->load('autores', 'categorias');
        return view('pagina.producto', compact('libro'));
    }
}
