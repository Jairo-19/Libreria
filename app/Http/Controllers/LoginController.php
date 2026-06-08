<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Introduce un correo electrónico válido.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']], $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Inicio de sesión exitoso. Bienvenido a Verso & Prosa.');
        }

        // Autenticación fallida, redirigir de vuelta al login con un mensaje de error
        return redirect()->back()->withErrors(['email' => 'Credenciales inválidas. Por favor, inténtalo de nuevo.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
