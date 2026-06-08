<?php

namespace App\Http\Controllers;

use App\Models\CarritoCompra;
use App\Models\Libro;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function index()
    {
        $items = collect();
        $baseImponible = 0;
        $descuentoTotal = 0;

        if (auth()->check()) {
            $items = CarritoCompra::with('libro')->where('usuario_id', auth()->id())->get();
            foreach ($items as $item) {
                $precio = $item->libro->precio;
                $cant = $item->cantidad;
                $baseImponible += $precio * $cant;
                $descuentoTotal += $precio * $item->libro->descuento / 100 * $cant;
            }
        }

        return view('pagina.carrito', array_merge(
            compact('items'),
            $this->calcularResumen(auth()->id())
        ));
    }

    public function add(Libro $libro)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $enCarrito = CarritoCompra::where('usuario_id', auth()->id())
            ->where('libro_id', $libro->id)->first();

        $cantidadActual = $enCarrito ? $enCarrito->cantidad : 0;

        if ($libro->stock < 1 || !$libro->activo || $cantidadActual >= $libro->stock) {
            $error = "Unidades del libro '{$libro->titulo}' se han agotado";
            if (request()->wantsJson()) {
                return response()->json(['error' => $error], 422);
            }
            return redirect()->back()->withErrors(['stock' => $error]);
        }

        if ($enCarrito) {
            $enCarrito->increment('cantidad');
        } else {
            CarritoCompra::create([
                'usuario_id' => auth()->id(),
                'libro_id' => $libro->id,
                'cantidad' => 1,
            ]);
        }

        if (request()->wantsJson()) {
            return response()->json($this->calcularResumen(auth()->id()));
        }

        return redirect()->back()->with('success', 'Libro añadido al carrito');
    }

    public function destroy(CarritoCompra $carrito)
    {
        abort_unless($carrito->usuario_id === auth()->id(), 403);

        $carrito->delete();

        if (request()->wantsJson()) {
            return response()->json($this->calcularResumen(auth()->id()));
        }

        return redirect()->route('carrito');
    }

    public function updateQuantity(CarritoCompra $carrito, string $action)
    {
        abort_unless($carrito->usuario_id === auth()->id(), 403);

        if ($action === 'sumar' && $carrito->cantidad >= $carrito->libro->stock) {
            $error = "Unidades del libro '{$carrito->libro->titulo}' se han agotado";
            if (request()->wantsJson()) {
                return response()->json(['error' => $error], 422);
            }
            return redirect()->back()->withErrors(['stock' => $error]);
        }

        match ($action) {
            'sumar' => $carrito->increment('cantidad'),
            'restar' => $carrito->cantidad <= 1 ? $carrito->delete() : $carrito->decrement('cantidad'),
            default => null,
        };

        if (request()->wantsJson()) {
            return response()->json($this->calcularResumen(auth()->id()));
        }

        return redirect()->route('carrito');
    }

    public function resumen()
    {
        return response()->json($this->calcularResumen(auth()->id()));
    }

    private function calcularResumen(?int $usuarioId): array
    {
        $baseImponible = 0;
        $descuentoTotal = 0;

        if ($usuarioId) {
            $items = CarritoCompra::with('libro')->where('usuario_id', $usuarioId)->get();
            foreach ($items as $item) {
                $precio = $item->libro->precio;
                $cant = $item->cantidad;
                $baseImponible += $precio * $cant;
                $descuentoTotal += $precio * $item->libro->descuento / 100 * $cant;
            }
        }

        $resta = $baseImponible - $descuentoTotal;

        return [
            'baseImponible' => number_format($baseImponible, 2),
            'descuentoTotal' => number_format($descuentoTotal, 2),
            'resta' => number_format($resta, 2),
            'total' => number_format($resta, 2),
        ];
    }
}
