@extends('layout.master-login')

@section('title', 'Login')

@section('content')

<div class="flex h-screen w-screen">

    <!-- Mitad izquierda: video -->
    <div class="w-1/2 hidden md:block">
        <video autoplay muted loop playsinline class="w-full h-full object-cover">
            <source src="{{ asset('videos/libro.mp4') }}" type="video/mp4">
        </video>
    </div>

    <!-- Mitad derecha: formulario -->
    <div class="w-full md:w-1/2 flex items-center justify-center p-8 bg-gray-50 overflow-y-auto">
        <div class="w-full max-w-md">
            <!-- Encabezado -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-[#8D5717] mb-2">Bienvenida</h1>
                <p class="text-gray-600 text-sm">Inicia sesión para continuar</p>
            </div>

            <!-- Formulario -->
            <form action="{{ url('/login') }}" method="POST" class="space-y-5">
                @csrf
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-800 mb-2">Correo Electrónico</label>
                    <div class="flex items-center border border-gray-300 rounded-lg px-4 py-3 focus-within:ring-2 focus-within:ring-[#8D5717]">
                        <i class="bi bi-envelope text-gray-500 mr-3 text-base"></i>
                        <input type="email" id="email" name="email" placeholder="tu@correo.com" required
                               class="w-full outline-none bg-transparent text-base">
                    </div>
                </div>

                <!-- Contraseña -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-800 mb-2">Contraseña</label>
                    <div class="flex items-center border border-gray-300 rounded-lg px-4 py-3 focus-within:ring-2 focus-within:ring-[#8D5717]">
                        <i class="bi bi-lock text-gray-500 mr-3 text-base"></i>
                        <input type="password" id="password" name="password" placeholder="••••••••" required
                               class="w-full outline-none bg-transparent text-base">
                        <i class="bi bi-eye-slash text-gray-500 cursor-pointer ml-3 text-base"></i>
                    </div>
                </div>

                <!-- Recuérdame -->
                <div class="flex items-center gap-2">
                    <input type="checkbox" id="remember" name="remember" class="accent-[#8D5717] w-4 h-4 cursor-pointer">
                    <label for="remember" class="text-sm text-gray-600 cursor-pointer">Recuérdame</label>
                </div>

                <!-- Botón -->
                <button type="submit" class="w-full bg-[#8D5717] hover:bg-[#6e4010] text-white font-semibold py-3 rounded-lg transition mt-6 text-base">
                    Iniciar Sesión
                </button>
            </form>

            <!-- Link al registro -->
            <p class="text-center text-gray-600 text-sm mt-6">
                ¿No tienes cuenta? <a href="{{ route('registro') }}" class="text-[#8D5717] hover:underline font-semibold">Regístrate aquí</a>
            </p>
        </div>
    </div>

</div>

@endsection