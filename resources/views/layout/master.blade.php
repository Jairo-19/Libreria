<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('imagenes/logo.png') }}">
    <title>@yield('title', 'Mi Librería')</title>
</head>
<body>
    @include('layout.header')
    <main>
        @yield('content')
    </main>
    @include('layout.footer')
</body>
</html>