@extends('layout.master')

@section('title', 'Libros')

@section('content')

<div class="text-center py-16 px-4">
    <h1 class="text-4xl font-bold p-4">Nuestro <span class="text-[#8D5717]">catálogo</span></h1>
    <p class="text-lg text-gray-600">Descubre tu nuevo libro favorito y embarcate en una nueva aventura</p>
    <hr class="my-4 w-1/2 mx-auto border-gray-300">
</div>



<section class="max-w-7xl mx-auto px-4 pb-16">
    <div class="flex justify-end w-full p-2 mb-6">
        <div class="relative w-full md:w-1/2 lg:w-1/3">
            <i class="bi bi-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            <input
                type="text"
                placeholder="Buscar..."
                class="w-full pl-10 pr-4 py-2 border rounded-full">
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($libros as $libro)
        <a href="{{ route('producto.show', $libro) }}" class="rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col relative">
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
                    <button data-add-cart="{{ route('carrito.agregar', $libro) }}" class="bg-[#8D5717] hover:bg-[#7E3716] text-white px-3 py-1.5 rounded text-sm transition-colors">
                        <i class="bi bi-cart-plus"></i>
                    </button>
                </div>
            </div>
        </a>
        @empty
        <div class="col-span-full text-center py-20 p-4 rounded-lg">
            <i class="bi bi-book block mb-4 text-8xl text-[#8D5717]"></i>
            <p class="text-xl  text-gray-500">No hay libros en el catálogo aún.</p>
        </div>
        @endforelse
    </div>
</section>

@endsection