<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check() || Auth::user()->rol !== 'ADMIN') {
            return redirect()->route('home');
        }

        $search = trim((string) $request->query('q', ''));

        $usuarios = Usuarios::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($subquery) use ($search) {
                    $subquery->where('nombre', 'like', "%{$search}%")
                        ->orWhere('apellido_1', 'like', "%{$search}%")
                        ->orWhere('apellido_2', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('telefono', 'like', "%{$search}%")
                        ->orWhere('rol', 'like', "%{$search}%");
                });
            })
            ->orderBy('fecha_registro', 'desc')
            ->get();

        return view('admin.usuarios', compact('usuarios', 'search'));
    }
}