<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListaDeseos;
use Illuminate\Support\Facades\Auth;

class ListaDeseosController extends Controller
{
    public function index()
    {
        // Obtener el usuario autenticado
        $usuario = Auth::user();

        // Si no hay usuario autenticado, redirigir a login
        if (!$usuario) {
            return redirect()->route('login');
        }

        // Obtener todos los libros en la lista de deseos del usuario
        $libros = ListaDeseos::where('usuario_id', $usuario->id)
            ->with('libro')
            ->get()
            ->pluck('libro');

        return view('pagina.lista-deseos', compact('libros'));
    }

    public function add($libroId)
    {
        $usuario = Auth::user();

        if (!$usuario) {
            return response()->json(['error' => 'No autenticado'], 401);
        }

        // Verificar si ya existe en la lista de deseos
        $existe = ListaDeseos::where('usuario_id', $usuario->id)
            ->where('libro_id', $libroId)
            ->exists();

        if (!$existe) {
            ListaDeseos::create([
                'usuario_id' => $usuario->id,
                'libro_id' => $libroId,
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Agregado a lista de deseos']);
    }

    public function destroy($libroId)
    {
        $usuario = Auth::user();

        if (!$usuario) {
            return response()->json(['error' => 'No autenticado'], 401);
        }

        ListaDeseos::where('usuario_id', $usuario->id)
            ->where('libro_id', $libroId)
            ->delete();

        return response()->json(['success' => true, 'message' => 'Eliminado de lista de deseos']);
    }
}
