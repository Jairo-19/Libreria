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


<section>

</section>


@endsection