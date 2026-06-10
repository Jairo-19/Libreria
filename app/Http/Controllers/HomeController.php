<?php

namespace App\Http\Controllers;

use App\Models\ListaDeseos;
use App\Models\Libro;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke()
    {
        $ofertas = Libro::where('descuento', '>', 25)->get();
        $favoritosIds = Auth::check()
            ? ListaDeseos::where('usuario_id', Auth::id())->pluck('libro_id')->all()
            : [];

        return view('pagina.home', compact('ofertas', 'favoritosIds'));
    }
}
