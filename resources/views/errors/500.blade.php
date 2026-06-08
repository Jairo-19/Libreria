@extends('layout.master-login')

@section('title', 'Error 500')

@section('content')

<section class="flex flex-col items-center justify-center h-screen text-center gap-6">
    <div>
    <i class="bi bi-exclamation-triangle-fill text-9xl text-red-500"></i>
    </div>
    
    <div>
        <h1 class="text-4xl font-bold p-2">ERROR 500!</h1>
        <p class="p-2">Parece que algo salió mal en el servidor. <br>
        Por favor, intenta recargar la página o vuelve más tarde.</p>
        </p>
    </div>
</section>


@endsection