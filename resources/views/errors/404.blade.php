@extends('layout.master-login')

@section('title', 'Error 404')

@section('content')

<section class="flex flex-col items-center justify-center h-screen text-center gap-6">
    <div>
    <i class="bi bi-exclamation-triangle-fill text-9xl text-amber-300"></i>
    </div>
    
    <div>
        <h1 class="text-4xl font-bold p-2">ERROR 404!</h1>
        <p class="p-2">Parece que no encontramos la página que estás buscando.</p>
        <a href="{{ route('home') }}" class="text-[#8D5717] hover:underline font-semibold">Volver al inicio</a>
    </div>
</section>


@endsection