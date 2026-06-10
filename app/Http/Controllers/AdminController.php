<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        if (!Auth::check() || Auth::user()->rol !== 'ADMIN') {
            return redirect()->route('home');
        }

        $inicioMes = Carbon::now()->startOfMonth();
        $finMes = Carbon::now()->endOfMonth();

        $pedidosMes = Pedido::whereBetween('fecha_pedido', [$inicioMes, $finMes])->count();

        $ingresosMes = Pedido::whereBetween('fecha_pedido', [$inicioMes, $finMes])
            ->join('detalle_pedido', 'pedidos.id', '=', 'detalle_pedido.pedido_id')
            ->join('libros', 'detalle_pedido.libro_id', '=', 'libros.id')
            ->selectRaw('COALESCE(SUM(detalle_pedido.cantidad * (libros.precio - (libros.precio * COALESCE(libros.descuento, 0) / 100))), 0) as total')
            ->value('total');

        $totalLibrosImportados = Libro::whereNotNull('open_library_id')->count();

        return view('admin.admin', compact('pedidosMes', 'ingresosMes', 'totalLibrosImportados'));
    }

    public function usuarios()
    {
        if (!Auth::check() || Auth::user()->rol !== 'ADMIN') {
            return redirect()->route('home');
        }

        return view('admin.usuarios');
    }
}
