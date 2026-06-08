<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function index()
    {
        return view('login.registro');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido_1' => 'required|string|max:100',
            'apellido_2' => 'nullable|string|max:100',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:8|confirmed',
            'telefono' => 'required|numeric|digits_between:1,9',
        ]);

        // Crear el nuevo usuario
        $usuario = new \App\Models\Usuarios();
        $usuario->nombre = $validatedData['nombre'];
        $usuario->apellido_1 = $validatedData['apellido_1'];
        $usuario->apellido_2 = $validatedData['apellido_2'] ?? null;
        $usuario->email = $validatedData['email'];
        $usuario->password = bcrypt($validatedData['password']);
        $usuario->telefono = $validatedData['telefono'];
        $usuario->save();

        // Redirigir al usuario al home con un mensaje de éxito
        return redirect()->route('home')->with('success', 'Registro exitoso. Bienvenido a Verso & Prosa.');
    }
}
