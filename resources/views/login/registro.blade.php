@extends('layout.master-login')

@section('title', 'Registro')

@section('content')

<section class="flex h-screen w-screen">

    <!-- Mitad izquierda: video -->
    <div class="w-1/2 hidden md:block">
        <video autoplay muted loop playsinline class="w-full h-full object-cover">
            <source src="{{ asset('videos/libro.mp4') }}" type="video/mp4">
        </video>
    </div>

    <!-- Mitad derecha: formulario -->
    <div class="w-full md:w-1/2 flex items-center justify-center p-4 bg-gray-50">
        <div class="w-full max-w-md">
            <!-- Encabezado -->
            <div class="mb-4">
                <h1 class="text-3xl font-bold text-[#8D5717] mb-1">Bienvenido</h1>
                <p class="text-gray-600 text-sm">Crea tu cuenta para empezar</p>
            </div>

            @if ($errors->any())
                <div id="errores" class="bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded-lg text-sm mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <script>setTimeout(() => { const e = document.getElementById('errores'); if (e) e.remove(); }, 3000);</script>
            @endif

            <!-- Formulario -->
            <form action="{{ url('/registro') }}" method="POST" class="space-y-3">
                @csrf
            
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                
                    <div>
                        <label for="nombre" class="block text-xs font-semibold text-gray-800 mb-1">Nombre</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Pedro" value="{{ old('nombre') }}" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8D5717] focus:border-transparent outline-none transition text-sm">
                    </div>

                    <div>
                        <label for="apellido_1" class="block text-xs font-semibold text-gray-800 mb-1">Primer Apellido</label>
                        <input type="text" id="apellido_1" name="apellido_1" placeholder="García" value="{{ old('apellido_1') }}" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8D5717] focus:border-transparent outline-none transition text-sm">
                    </div>

                    <div>
                        <label for="apellido_2" class="block text-xs font-semibold text-gray-800 mb-1">Segundo Apellido</label>
                        <input type="text" id="apellido_2" name="apellido_2" placeholder="López" value="{{ old('apellido_2') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8D5717] focus:border-transparent outline-none transition text-sm">
                    </div>

                    <div>
                        <label for="telefono" class="block text-xs font-semibold text-gray-800 mb-1">Teléfono</label>
                        <input type="text" id="telefono" name="telefono" placeholder="612345678" value="{{ old('telefono') }}" maxlength="9" pattern="[679]\d{8}" title="9 dígitos empezando por 6, 7 o 9" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8D5717] focus:border-transparent outline-none transition text-sm">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-xs font-semibold text-gray-800 mb-1">Correo Electrónico</label>
                    <input type="email" id="email" name="email" placeholder="pedro@gmail.com" value="{{ old('email') }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8D5717] focus:border-transparent outline-none transition text-sm">
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                    <div>
                        <label for="password" class="block text-xs font-semibold text-gray-800 mb-1">Contraseña</label>
                        <div class="relative">
                            <input type="password" id="reg_password" name="password" placeholder="••••••••" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8D5717] focus:border-transparent outline-none transition text-sm pr-10">
                            <i class="bi bi-eye-slash text-gray-500 cursor-pointer absolute right-3 top-1/2 -translate-y-1/2 text-sm" data-toggle-password data-target="reg_password"></i>
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-xs font-semibold text-gray-800 mb-1">Confirmar</label>
                        <div class="relative">
                            <input type="password" id="reg_password_confirmation" name="password_confirmation" placeholder="••••••••" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8D5717] focus:border-transparent outline-none transition text-sm pr-10">
                            <i class="bi bi-eye-slash text-gray-500 cursor-pointer absolute right-3 top-1/2 -translate-y-1/2 text-sm" data-toggle-password data-target="reg_password_confirmation"></i>
                        </div>
                    </div>
                </div>

                <button type="submit" class="w-full bg-[#8D5717] hover:bg-[#6e4010] text-white font-semibold py-2 rounded-lg transition mt-2 text-sm">
                    Registrarse
                </button>
            </form>

            <p class="text-center text-gray-600 text-xs mt-3">
                ¿Ya tienes cuenta? <a href="{{ route('login') }}" class="text-[#8D5717] hover:underline font-semibold">Inicia sesión aquí</a>
            </p>
        </div>
    </div>

</section>

@endsection