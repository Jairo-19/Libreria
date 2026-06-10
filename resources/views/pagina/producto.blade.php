@extends('layout.master')

@section('title', $libro->titulo)

@section('content')

<section class="max-w-7xl mx-auto px-4 py-12">
    <!-- Breadcrumb -->
    <nav class="mb-8">
        <ol class="flex text-sm text-gray-600">
            <li><a href="{{ route('home') }}" class="hover:text-[#8D5717]">Inicio</a></li>
            <li class="mx-2">/</li>
            <li><a href="{{ route('libros') }}" class="hover:text-[#8D5717]">Libros</a></li>
            <li class="mx-2">/</li>
            <li class="text-gray-800">{{ $libro->titulo }}</li>
        </ol>
    </nav>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
        <!-- Imagen del libro -->
        <div class="flex justify-center items-start">
            @if ($libro->imagen)
                <img src="{{ $libro->imagen }}" alt="{{ $libro->titulo }}" class="w-full max-w-md rounded-lg shadow-lg object-cover">
            @else
                <div class="w-full max-w-md h-96 bg-gray-100 rounded-lg flex items-center justify-center text-gray-300">
                    <i class="bi bi-book" style="font-size: 8rem; line-height: 1;"></i>
                </div>
            @endif
        </div>

        <!-- Información del libro -->
        <div>
            <div class="font-bold text-3xl mb-6 text-[#9C5A17]">
                <h1>{{ $libro->titulo }}</h1>
            </div>

            <hr class="mb-6 border-[#9C5A17] rounded-2xl border-2">

            <div class="mt-4 text-gray-700 leading-relaxed text-justify mb-6">
                 <h4 class="font-semibold text-gray-800 mb-2">Descripción</h4>
                @if ($libro->descripcion)
                    <p class="text-sm text-gray-500 mb-2">{{ $libro->descripcion }}</p>
                @else
                    <p class="text-sm text-gray-500 mb-2">No hay descripción disponible para este libro.</p>
                @endif
            </div>

            <div class="mb-6">
                <h4 class="font-semibold text-gray-800 mb-2">Categorías</h4>
                @foreach ($libro->categorias as $categoria)
                    <span class="inline-block bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-sm mr-2 mb-2">{{ $categoria->nombre }}</span>
                @endforeach
            </div>

            <div class="mb-6">
                <h4 class="font-semibold text-gray-800 mb-2">Autores</h4>
                @foreach ($libro->autores as $autor)
                    <span class="inline-block bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-sm mr-2 mb-2">{{ $autor->nombre_completo }}</span>
                @endforeach
            </div>

            <div class="mb-6">
                <h4 class="font-semibold text-gray-800 mb-2">Editorial</h4>
                @if ($libro->editorial)
                    <span class="inline-block bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-sm mr-2 mb-2">{{ $libro->editorial }}</span>
                @else
                    <span class="inline-block bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-sm mr-2 mb-2">No disponible</span>
                @endif
            </div>

            <div class="mb-6">
                <h4 class="font-semibold text-gray-800 mb-2">Año de publicación</h4>
                @if ($libro->anio)
                    <span class="inline-block bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-sm mr-2 mb-2">{{ $libro->anio }}</span>
                @else
                    <span class="inline-block bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-sm mr-2 mb-2">No disponible</span>
                @endif
            </div>

            <div class="mb-6">
                <h4 class="font-semibold text-gray-800 mb-2">Precio</h4>
                <span class="text-2xl font-bold text-[#8D5717]">${{ number_format($libro->precio, 2) }}</span>
                @if ($libro->descuento > 0)
                    <span class="ml-2 text-xs bg-red-100 text-red-600 px-2 py-0.5 rounded-full">-{{ $libro->descuento }}%</span>
                @endif
            </div>

            <div class="flex gap-3">
                <button data-add-cart="{{ route('carrito.agregar', $libro) }}" class="inline-flex items-center gap-2 px-8 py-3 bg-[#8D5717] text-white rounded-lg hover:bg-[#7E3716] font-semibold transition cursor-pointer">
                    <i class="bi bi-cart-plus"></i> Agregar al carrito
                </button>
                
                <button data-wishlist-btn data-libro-id="{{ $libro->id }}" class="inline-flex items-center gap-2 px-8 py-3 border-2 border-[#8D5717] rounded-lg font-semibold transition cursor-pointer {{ in_array($libro->id, $favoritosIds ?? []) ? 'bg-[#8D5717] text-white' : 'text-[#8D5717] hover:bg-[#8D5717] hover:text-white' }}">
                    <i class="bi {{ in_array($libro->id, $favoritosIds ?? []) ? 'bi-heart-fill' : 'bi-heart' }}"></i> Agregar a favoritos
                </button>
            </div>
        </div>
    </div>
</section>

@endsection