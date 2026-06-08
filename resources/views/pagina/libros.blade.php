@extends('layout.master')

@section('title', 'Libros')

@section('content')

    <div class="text-center py-16 px-4">
        <h1 class="text-4xl font-bold p-4">Nuestro <span class="text-[#8D5717]">catálogo</span></h1>
        <p class="text-lg text-gray-600">Descubre tu nuevo libro favorito y embarcate en una nueva aventura</p>
    </div>

    <!--buscador-->
    <div class="flex justify-end pr-12 pb-10 p-2.5">
        <label for="buscador" class="items-center gap-3 w-80 border-2 rounded-full px-5 py-3 shadow-md">
            <i class="bi bi-search"></i>
            <input type="text" id="buscador" placeholder="Buscar..." class="flex-1 bg-transparent outline-none text-gray-700 placeholder-gray-400 text-sm font-medium"/>
        </label>
    </div>


<section class="max-w-7xl mx-auto px-4 pb-16">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($libros as $libro)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col">
                @if ($libro->imagen)
                    <img src="{{ $libro->imagen }}" alt="{{ $libro->titulo }}" class="w-full h-64 object-cover">
                @else
                    <div class="w-full h-64 bg-gray-200 flex items-center justify-center text-gray-400">
                        <i class="bi bi-book text-5xl"></i>
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
                <i class="bi bi-book text-6xl block mb-4"></i>
                <p class="text-xl">No hay libros en el catálogo aún.</p>
                <p class="text-sm mt-2">Importa libros visitando <code class="bg-gray-100 px-2 py-1 rounded">/importar/tu-búsqueda</code></p>
            </div>
        @endforelse
    </div>
</section>


@endsection