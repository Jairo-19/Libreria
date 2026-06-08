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

    <section class="max-w-7xl mx-auto px-4 pb-16">
        <div class="text-center py-12">
            <h1 class="text-4xl font-bold p-4">NUESTRAS MEJORES <span class="text-[#8D5717]">OFERTAS!!!</span></h1>
            <p class="text-lg text-gray-600">No te las pierdas</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($ofertas as $libro)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col relative">
                <button data-wishlist-btn class="absolute top-2 right-2 bg-white/70 text-gray-500 rounded-full p-1.5 transition z-10">
                    <i class="bi bi-heart"></i>
                </button>
                @if ($libro->imagen)
                <img src="{{ $libro->imagen }}" alt="{{ $libro->titulo }}" class="w-full h-64 object-cover" loading="lazy">
                @else
                <div class="w-full h-64 bg-gray-100 flex items-center justify-center text-gray-300">
                    <i class="bi bi-book" style="font-size: 6rem; line-height: 1;"></i>
                </div>
                @endif
                <div class="p-4 flex flex-col flex-1">
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $libro->titulo }}</h3>
                    @if ($libro->editorial)
                    <p class="text-sm text-gray-500 mb-2">{{ $libro->editorial }}</p>
                    @endif
                    <div class="mt-auto flex items-center justify-between">
                        <div>
                            <span class="text-xl font-bold text-[#8D5717]">${{ number_format($libro->precio, 2) }}</span>
                            @if ($libro->descuento > 0)
                            <span class="ml-2 text-xs bg-red-100 text-red-600 px-2 py-0.5 rounded-full">-{{ $libro->descuento }}%</span>
                            @endif
                        </div>
                        <button class="bg-[#8D5717] hover:bg-[#7E3716] text-white px-3 py-1.5 rounded text-sm transition-colors">
                            <i class="bi bi-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-20 text-gray-500">
                <p class="text-xl">No hay ofertas disponibles aún.</p>
            </div>
            @endforelse
        </div>
    </section>
@endsection