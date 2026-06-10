<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Finlandica+Headline:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap">

    <link rel="icon" href="{{ asset('imagenes/logo.png') }}">
    <title>@yield('title', 'Panel de Administración')</title>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex flex-col">
        <header class="bg-[#1f2937] text-white px-6 py-4 shadow-md flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.panel') }}" class="flex items-center gap-3">
                    <img src="{{ asset('imagenes/logo.png') }}" alt="Logo de la librería" class="h-10 w-10 rounded-full object-cover bg-white">
                    <div>
                        <p class="text-sm uppercase tracking-widest text-gray-300">Panel Admin</p>
                        <h1 class="text-xl font-bold">Verso & Prosa</h1>
                    </div>
                </a>
            </div>

            <div class="flex items-center gap-3">
                <span class="text-sm text-gray-300">Hola, {{ Auth::user()->nombre }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-white text-gray-800 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-gray-200 transition">
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </header>

        <div class="flex flex-1 min-h-0">
            <aside class="w-64 bg-white border-r border-gray-200 p-5 hidden md:flex md:flex-col gap-2">
                <p class="text-xs uppercase tracking-[0.25em] text-gray-500 mb-2">Navegación</p>

                <a href="{{ route('admin.panel') }}" class="px-4 py-3 rounded-lg {{ request()->routeIs('admin.panel') ? 'bg-[#8D5717] text-white' : 'text-gray-700 hover:bg-gray-100' }} transition">
                    Panel principal
                </a>
                <a href="{{ route('home') }}" class="px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-100 transition">
                    Ir al sitio
                </a>
                <a href="{{ route('libros') }}" class="px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-100 transition">
                    Libros
                </a>
                <a href="{{ route('perfil') }}" class="px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-100 transition">
                    Perfil
                </a>
            </aside>

            <main class="flex-1 p-6 md:p-8 overflow-y-auto">
                <div class="max-w-6xl mx-auto">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>