@extends('layout.master')

@section('title', 'Carrito')

@section('content')

<div class="max-w-4xl mx-auto px-4 py-12">
    <div class="flex items-center gap-3 mb-8">
        <i class="bi bi-cart text-3xl text-[#8D5717]"></i>
        <h1 class="text-3xl font-bold">Tu Carrito</h1>
    </div>

    @if ($errors->any())
        <div id="cart-error" class="bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded-lg text-sm mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <script>setTimeout(() => { const e = document.getElementById('cart-error'); if (e) e.remove(); }, 3000);</script>
    @endif

    @if ($items->isEmpty())
        <div class="text-center py-20 text-gray-500">
            <i class="bi bi-cart-x text-6xl block mb-4"></i>
            <p class="text-xl">Tu carrito está vacío.</p>
            <a href="{{ url('/libros') }}" class="mt-4 inline-block bg-[#8D5717] hover:bg-[#7E3716] text-white px-6 py-2 rounded transition">Ver catálogo</a>
        </div>
    @else
        <div class="space-y-4">
            @foreach ($items as $item)
            <div class="cart-item flex items-center gap-4 bg-white rounded-lg shadow-sm p-4 hover:shadow-md transition">
                <img src="{{ $item->libro->imagen ?? asset('imagenes/placeholder.png') }}" alt="{{ $item->libro->titulo }}" class="w-20 h-28 object-cover rounded">
                <div class="flex-1 min-w-0">
                    <h3 class="font-semibold text-gray-800 truncate">{{ $item->libro->titulo }}</h3>
                    <p class="text-sm text-gray-500">{{ $item->libro->editorial ?? 'Sin editorial' }}</p>
                    <div class="flex items-center gap-3 mt-1">
                        <span class="text-[#8D5717] font-bold">${{ number_format($item->libro->precio, 2) }}</span>
                        @if ($item->libro->descuento > 0)
                        <span class="text-xs bg-red-100 text-red-600 px-2 py-0.5 rounded-full">-{{ $item->libro->descuento }}%</span>
                        @endif
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex items-center border rounded">
                        <button data-cart-down="{{ route('carrito.cantidad', [$item, 'restar']) }}" class="px-2 py-1 text-gray-500 hover:text-gray-700 transition text-sm">−</button>
                        <span class="cart-qty px-3 py-1 text-sm font-medium border-x">{{ $item->cantidad }}</span>
                        <button data-cart-up="{{ route('carrito.cantidad', [$item, 'sumar']) }}" class="px-2 py-1 text-gray-500 hover:text-gray-700 transition text-sm">+</button>
                    </div>
                    <form data-remove-cart action="{{ route('carrito.eliminar', $item) }}" method="POST">
                        @csrf
                        <button class="text-gray-400 hover:text-red-500 transition p-1">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Resumen -->
        <div id="resumen-cart" data-url="{{ route('carrito.resumen') }}" class="mt-8 bg-white rounded-xl shadow-md p-6 max-w-md ml-auto">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Resumen del pedido</h2>
            <table class="w-full text-sm">
                <tr>
                    <td class="py-2 text-gray-600">Base imponible</td>
                    <td id="r-base" class="py-2 text-right font-medium">${{ number_format($baseImponible, 2) }}</td>
                </tr>
                <tr>
                    <td class="py-2 text-gray-600">Descuento</td>
                    <td id="r-dto" class="py-2 text-right text-green-600 font-medium">-${{ number_format($descuentoTotal, 2) }}</td>
                </tr>
                <tr class="border-t-2 border-gray-800">
                    <td class="py-3 text-gray-900 font-bold text-base">Total</td>
                    <td id="r-total" class="py-3 text-right text-[#8D5717] font-bold text-lg">${{ number_format($total, 2) }}</td>
                </tr>
            </table>
            <a href="#" class="mt-6 block w-full bg-[#8D5717] hover:bg-[#7E3716] text-white text-center font-semibold py-3 rounded-lg transition">
                Proceder al pago
            </a>
        </div>
    @endif
</div>

@endsection
