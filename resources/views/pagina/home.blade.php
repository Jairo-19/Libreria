@extends('layout.master')

@section('title', 'Inicio')

@section('content')

    <!-- hero -->
    <section class="relative">
        <video autoplay muted loop playsinline class="w-full h-auto shadow-md mb-8">
            <source src="{{ asset('videos/libreria.mp4') }}" type="video/mp4">
        </video>

        <div class="absolute inset-0 flex items-center justify-center z-0 pointer-events-none">
            <div class="text-center drop-shadow-lg">
                <h1 class="text-white text-5xl font-extrabold tracking-wide drop-shadow-[0_2px_8px_rgba(0,0,0,0.8)]">
                    Verso & <span class="text-[#8D5717]">Prosa</span>
                </h1>
                <p class="text-white text-xl mt-3 font-medium drop-shadow-[0_2px_6px_rgba(0,0,0,0.8)]">
                    Literatura que conecta historias y personas.
                </p>
            </div>
        </div>
    </section>
@endsection