<?php

namespace App\Http\Controllers;

use App\Models\Libro;

class HomeController extends Controller
{
    public function __invoke()
    {
        $ofertas = Libro::where('descuento', '>', 25)->get();
        return view('pagina.home', compact('ofertas'));
    }
}
