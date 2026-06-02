@extends('layout.master')

@section('title', 'Contacto')

@section('content')
    
<!-- -->


<!--preguntas frecuentes -->
<section>
    <div class="text-center">
        <h1 class="text-2xl text-extrabold">Preguntas frecuentes</h1>
        <p class="text-gray-600">Resolvemos tus preguntas sobre envíos, devoluciones y más</p>
        <hr class="my-8 mx-auto w-1/6 border-[#7E3716] border-3 rounded-full">
    </div>

    <div class="text-left mx-auto w-1/2">
        <details class="p-3 rounded border-l-4 border-l-[#8A501C] border-slate-100 shadow-sm mb-4">
            <summary class="text-lg font-semibold p-3">¿Cuánto tarda en llegar mi pedido?</summary>
            <p>Los envíos nacionales suelen tardar entre 2 y 5 días laborables.</p>
        </details>

        <details class="p-3 rounded border-l-4 border-l-[#8A501C] border-slate-100 shadow-sm mb-4">
            <summary class="text-lg font-semibold p-3">¿Puedo devolver un libro si no me gusta?</summary>
            <p>Sí, aceptamos devoluciones dentro de los 30 días posteriores a la compra.</p>
        </details>

        <details class="p-3 rounded border-l-4 border-l-[#8A501C] border-slate-100 shadow-sm mb-4">
            <summary class="text-lg font-semibold p-3">¿Qué hago si mi pedido llega dañado?</summary>
            <p>Si tu pedido llega dañado, por favor contáctanos de inmediato para gestionar la devolución o el reemplazo.</p> 
        </details>

        <details class="p-3 rounded border-l-4 border-l-[#8A501C] border-slate-100 shadow-sm mb-4">
            <summary class="text-lg font-semibold p-3">¿Ofrecen la opción de empaquetado de regalo?</summary>
            <p>Sí, puedes solicitar un empaquetado de regalo al realizar tu pedido.</p>
        </details>
    </div>

    <div class="text-center border-2 border-[#8A501C] rounded-lg p-8 mt-12 w-1/2 mx-auto mb-12">
        <h2 class="text-lg font-semibold mb-6">¿Aún tienes dudas?</h2>
        <a class="bg-[#8A501C] hover:bg-[#7E3716] text-white px-6 py-2 rounded inline-block" href="https://mail.google.com/mail/?view=cm&fs=1&to=info@libreria.com&su=Pregunta" target="_blank">Contáctanos</a>
    </div>
</section>


@endsection