@extends('layout.master-admin')

@section('title', 'Panel de Administración')

@section('content')
    <article class="bg-white rounded-2xl shadow p-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Bienvenido al panel de administración</h1>
        <p class="text-gray-600">Hola, <span class="text-[#8D5717] font-bold">{{ Auth::user()->nombre }}</span>. Desde aquí puedes gestionar el sitio de forma simple.</p>
        <hr class="my-6 border-gray-300">

        <h1 class="text-2xl font-bold mb-4 text-[#8D5717]">Estadísticas</h1>
        <div class="grid grid-cols-3 gap-6">

            <div class="rounded-lg p-4 mb-4 font-semibold bg-[#D3C4B0]">
                <h5>Total de libros importados</h5>
                <p class="mt-2 text-3xl font-bold text-gray-900">{{ $totalLibrosImportados }}</p>
            </div>

            <div class="rounded-lg p-4 mb-4 font-semibold bg-[#D3C4B0]">
                <h5>Total de pedidos en el mes</h5>
                <p class="mt-2 text-3xl font-bold text-gray-900">{{ $pedidosMes }}</p>
            </div>

            <div class="rounded-lg p-4 mb-4 font-semibold bg-[#D3C4B0]">
                <h5>Total de ingresos en el mes</h5>
                <p class="mt-2 text-3xl font-bold text-gray-900">${{ number_format($ingresosMes, 2) }}</p>
            </div>
        </div>
    </article>
@endsection

