@extends('layout.master-admin')

@section('title', 'Panel de Administración')

@section('content')
    <div class="bg-white rounded-2xl shadow p-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Bienvenido al panel de administración</h1>
        <p class="text-gray-600">Hola, {{ Auth::user()->nombre }}. Desde aquí puedes gestionar el sitio de forma simple.</p>
    </div>
@endsection

