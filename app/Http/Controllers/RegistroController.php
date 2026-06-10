<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'telefono' => ['required', 'regex:/^[679]\d{8}$/'],
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede superar 100 caracteres.',
            'apellido_1.required' => 'El primer apellido es obligatorio.',
            'apellido_1.max' => 'El primer apellido no puede superar 100 caracteres.',
            'apellido_2.max' => 'El segundo apellido no puede superar 100 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Introduce un correo electrónico válido.',
            'email.unique' => 'Este correo ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.regex' => 'El teléfono debe tener 9 dígitos y empezar por 6, 7 o 9.',
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

        // Iniciar sesión automáticamente después del registro
        Auth::login($usuario);

        // Redirigir al usuario al home con un mensaje de éxito
        return redirect()->route('home')->with('success', 'Registro exitoso. Bienvenido a Verso & Prosa.');
    }
}
