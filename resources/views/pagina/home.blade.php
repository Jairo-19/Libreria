@extends('layout.master')

@section('title', 'Inicio')

@section('content')

    <!-- hero -->
    <section class="relative">
        <img src="{{ asset('imagenes/libros1.jpg') }}" alt="Imagen de portada" class="w-full h-auto shadow-md mb-8 opacity-40">
        
        <div class="absolute inset-0 flex items-center justify-center z-0 pointer-events-none">
            <div class="text-center">
                <h1 class=" text-[#8D5717] text-3xl font-bold">
                    Verso & Prosa
                </h1>
                <p class="text-lg">
                    Literatura que conecta historias y personas.
                </p>
            </div>
        </div>
    </section>
@endsection