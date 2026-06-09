@extends('layout.master')

@section('title', 'Mi Perfil')

@section('content')
<section class="max-w-7xl mx-auto px-4 py-12">
    <!-- Título -->
    <div class="text-center py-12 mb-8">
        <h1 class="text-4xl font-bold">Mi <span class="text-[#8D5717]">Perfil</span></h1>
        <hr class="my-4 w-1/3 mx-auto border-[#8D5717] border-2 rounded-2xl">
    </div>
    
    <!-- Tarjeta de bienvenida -->
    <div class="mb-12 p-8 bg-[#8D5717] text-white rounded-lg shadow-lg">
        <div class="flex items-center gap-6">
            <i class="bi bi-person-circle text-6xl flex-shrink-0"></i>
            <div>
                <h2 class="text-2xl font-bold mb-2">¡Bienvenido, {{ auth()->user()->nombre }}!</h2>
                <p class="text-sm opacity-90">Aquí puedes ver y gestionar tu información personal</p>
            </div>
        </div>
    </div>

    <!-- Datos del usuario -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
        <!-- Nombre -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-[#8D5717]">
            <div class="flex items-center gap-3 mb-2">
                <i class="bi bi-person text-[#8D5717] text-xl"></i>
                <span class="text-gray-600 text-sm font-semibold">Nombre</span>
            </div>
            <p class="text-gray-800 text-lg font-semibold">{{ auth()->user()->nombre }}</p>
        </div>

        <!-- Email -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-[#8D5717]">
            <div class="flex items-center gap-3 mb-2">
                <i class="bi bi-envelope text-[#8D5717] text-xl"></i>
                <span class="text-gray-600 text-sm font-semibold">Email</span>
            </div>
            <p class="text-gray-800 text-lg font-semibold break-all">{{ auth()->user()->email }}</p>
        </div>

        <!-- Primer Apellido -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-[#8D5717]">
            <div class="flex items-center gap-3 mb-2">
                <i class="bi bi-card-text text-[#8D5717] text-xl"></i>
                <span class="text-gray-600 text-sm font-semibold">Primer Apellido</span>
            </div>
            <p class="text-gray-800 text-lg font-semibold">{{ auth()->user()->apellido_1 ?? 'No especificado' }}</p>
        </div>

        <!-- Segundo Apellido -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-[#8D5717]">
            <div class="flex items-center gap-3 mb-2">
                <i class="bi bi-card-text text-[#8D5717] text-xl"></i>
                <span class="text-gray-600 text-sm font-semibold">Segundo Apellido</span>
            </div>
            <p class="text-gray-800 text-lg font-semibold">{{ auth()->user()->apellido_2 ?? 'No especificado' }}</p>
        </div>

        <!-- Teléfono -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-[#8D5717]">
            <div class="flex items-center gap-3 mb-2">
                <i class="bi bi-telephone text-[#8D5717] text-xl"></i>
                <span class="text-gray-600 text-sm font-semibold">Teléfono</span>
            </div>
            <p class="text-gray-800 text-lg font-semibold"> + 34 {{ auth()->user()->telefono ?? 'No especificado' }}</p>
        </div>

        <!-- Estado de la cuenta -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-[#8D5717]">
            <div class="flex items-center gap-3 mb-2">
                <i class="bi bi-check-circle text-[#8D5717] text-xl"></i>
                <span class="text-gray-600 text-sm font-semibold">Estado de la Cuenta</span>
            </div>
            <p class="text-gray-800 text-lg font-semibold"><span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Activa</span></p>
        </div>
    </div>

</section>


@endsection
