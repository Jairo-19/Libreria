@extends('layout.master-admin')

@section('title', 'Usuarios')

@section('content')
    <article class="bg-white rounded-2xl shadow p-8">
        <div class="flex items-start justify-between gap-6 flex-wrap">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Gestión de usuarios</h1>
                <p class="text-gray-600">Desde aquí puedes consultar la información de cada cliente de forma simple.</p>
            </div>

            <form method="GET" action="{{ route('usuarios') }}" class="w-full sm:w-96">
                <div class="flex items-center gap-2 bg-gray-50 border border-gray-300 rounded-2xl px-4 py-2 transition focus-within:ring-0 focus-within:border-[#8D5717]">
                    <i class="bi bi-search text-gray-500"></i>
                    <input
                        type="text"
                        name="q"
                        value="{{ $search ?? '' }}"
                        placeholder="Buscar usuario"
                        class="w-full bg-transparent border-0 outline-none focus:outline-none focus:ring-0 focus:border-transparent shadow-none">
                </div>
            </form>
        </div>

        <hr class="my-6 border-gray-300">

        <div class="flex items-center justify-between mb-6">
            <h3 class="font-bold text-xl text-[#8D5717]">Usuarios</h3>
            <span class="text-sm text-gray-500">{{ $usuarios->count() }} resultado(s)</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
            @forelse ($usuarios as $usuario)
                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 shadow-sm hover:shadow-md transition">
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <h4 class="font-semibold text-lg text-gray-800">
                                {{ $usuario->nombre }} {{ $usuario->apellido_1 }} {{ $usuario->apellido_2 }}
                            </h4>
                            <p class="text-sm text-gray-500">{{ $usuario->email }}</p>
                        </div>

                        <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold {{ $usuario->rol === 'ADMIN' ? 'bg-[#23536B] text-white' : 'bg-[#5E9614] text-white' }}">
                            {{ $usuario->rol }}
                        </span>
                    </div>

                    <div class="space-y-2 text-sm text-gray-700">
                        <p><span class="font-semibold text-gray-900">Teléfono:</span> {{ $usuario->telefono ?? 'No disponible' }}</p>
                        <p><span class="font-semibold text-gray-900">Registro:</span> {{ $usuario->fecha_registro?->format('d/m/Y H:i') ?? 'No disponible' }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-full rounded-2xl border border-dashed border-gray-300 bg-gray-50 p-10 text-center">
                    <i class="bi bi-people text-6xl text-gray-300 block mb-3"></i>
                    <p class="text-gray-600 text-lg">
                        {{ filled($search ?? '') ? 'No se encontraron usuarios con ese criterio.' : 'No hay usuarios registrados.' }}
                    </p>
                </div>
            @endforelse
        </div>
    </article>
@endsection