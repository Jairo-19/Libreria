@extends('layout.master')

@section('title', 'Lista de Deseos')

@section('content')
<section>
    <article class="max-w-7xl mx-auto px-4 py-12">
        <div class="text-center py-12 mb-8">
            <h1 class="text-4xl font-bold">Lista de <span class="text-[#8D5717]">deseos</span></h1>
            <hr class="my-4 w-1/3 mx-auto border-[#8D5717] border-2 rounded-2xl">
        </div>
    
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($libros as $libro)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col relative group">
                    <button data-wishlist-btn data-libro-id="{{ $libro->id }}" data-wishlist-reload="true" class="absolute top-2 right-2 bg-white/90 text-red-500 rounded-full p-2 transition z-10 hover:bg-white hover:text-red-600">
                        <i class="bi bi-heart-fill"></i>
                    </button>

                    <a href="{{ route('producto.show', $libro) }}" class="block h-full text-left">
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
                                <p class="text-sm text-gray-500 mb-4">{{ $libro->editorial }}</p>
                            @endif

                            @if ($libro->descripcion)
                                <p class="text-sm text-gray-600 mb-4 line-clamp-3">{{ $libro->descripcion }}</p>
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
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-600 text-lg">No tienes libros en tu lista de deseos</p>
                    <a href="{{ route('libros') }}" class="text-[#8D5717] font-semibold hover:underline mt-4 inline-block">Ir al catálogo</a>
                </div>
            @endforelse
        </div>
    </article>
</section>
@endsection
