<?php

namespace App\Http\Controllers;

use App\Models\ListaDeseos;
use App\Models\Libro;
use Illuminate\Support\Facades\Auth;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::where('stock', '>', 0)->where('activo', true)->get();
        $favoritosIds = Auth::check()
            ? ListaDeseos::where('usuario_id', Auth::id())->pluck('libro_id')->all()
            : [];

        return view('pagina.libros', compact('libros', 'favoritosIds'));
    }

    public function show(Libro $libro)
    {
        $libro->load('autores', 'categorias');
        $favoritosIds = Auth::check()
            ? ListaDeseos::where('usuario_id', Auth::id())->pluck('libro_id')->all()
            : [];

        return view('pagina.producto', compact('libro', 'favoritosIds'));
    }
}
