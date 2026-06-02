@extends('layout.master')

@section('title', 'Contacto')

@section('content')
    
<!-- presentacion-->

<section class="relative overflow-hidden py-16 px-4 sm:px-6 lg:px-8">
    <div class="absolute inset-x-0 top-0 -z-10 h-44 bg-linear-to-b"></div>

    <div class="mx-auto max-w-7xl">
        <div class="mx-auto max-w-3xl text-center">
            <span class="inline-flex items-center rounded-full border border-[#8A501C]/20 bg-[#8A501C]/10 px-4 py-1 text-sm font-semibold text-[#8A501C]">
                Experiencia pensada para ti
            </span>
            <h1 class="mt-4 text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-slate-900">
                ¿Qué te <span class="text-[#8A501C]">ofrecemos?</span>
            </h1>
            <p class="mt-4 text-base sm:text-lg text-slate-600 leading-relaxed">
                Una librería cercana, con recomendaciones cuidadas, atención real y una compra simple para que encuentres justo lo que buscas.
            </p>
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            <article class="group overflow-hidden rounded-2xl border border-[#8A501C]/20 bg-white shadow-[0_20px_50px_rgba(0,0,0,0.08)] transition-transform duration-300 hover:-translate-y-1">
                <div class="relative">
                    <img src="{{ asset('imagenes/aventura.jpg') }}" alt="Imagen de aventura" class="h-64 w-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-linear-to-t from-black/35 via-black/0 to-transparent"></div>
                </div>
                <div class="p-6 text-left">
                    <h2 class="text-xl font-semibold text-slate-900">Selección cuidada</h2>
                    <p class="mt-3 text-slate-600 leading-relaxed">Encontrarás libros elegidos con atención para acompañarte en cada lectura.</p>
                </div>
            </article>

            <article class="group overflow-hidden rounded-2xl border border-[#8A501C]/20 bg-white shadow-[0_20px_50px_rgba(0,0,0,0.08)] transition-transform duration-300 hover:-translate-y-1">
                <div class="relative">
                    <img src="{{ asset('imagenes/comunidad.jpg') }}" alt="Imagen de comunidad" class="h-64 w-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-linear-to-t from-black/35 via-black/0 to-transparent"></div>
                </div>
                <div class="p-6 text-left">
                    <h2 class="text-xl font-semibold text-slate-900">Atención cercana</h2>
                    <p class="mt-3 text-slate-600 leading-relaxed">Te ayudamos a resolver dudas y a elegir la mejor opción según lo que buscas.</p>
                </div>
            </article>

            <article class="group overflow-hidden rounded-2xl border border-[#8A501C]/20 bg-white shadow-[0_20px_50px_rgba(0,0,0,0.08)] transition-transform duration-300 hover:-translate-y-1 md:col-span-2 xl:col-span-1">
                <div class="relative">
                    <img src="{{ asset('imagenes/compra.jpg') }}" alt="Imagen de compra" class="h-64 w-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-linear-to-t from-black/35 via-black/0 to-transparent"></div>
                </div>
                <div class="p-6 text-left">
                    <h2 class="text-xl font-semibold text-slate-900">Compra sencilla</h2>
                    <p class="mt-3 text-slate-600 leading-relaxed">Disfruta de un proceso rápido, claro y pensado para que llegues a tu próximo libro sin complicaciones.</p>
                </div>
            </article>
        </div>
    </div>
</section>

<!--preguntas frecuentes -->
<section class="px-4 sm:px-6 lg:px-8">
    <div class="text-center">
        <h1 class="text-2xl sm:text-3xl text-extrabold">Preguntas frecuentes</h1>
        <p class="text-gray-600 mt-2">Resolvemos tus preguntas sobre envíos, devoluciones y más</p>
        <hr class="my-8 mx-auto w-24 sm:w-40 lg:w-1/6 border-[#7E3716] border-3 rounded-full">
    </div>

    <div class="text-left mx-auto w-full max-w-3xl">
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

    <div class="text-center border-2 border-[#8A501C] rounded-lg p-8 mt-12 w-full max-w-2xl mx-auto mb-12">
        <h2 class="text-lg font-semibold mb-6">¿Aún tienes dudas?</h2>
        <a class="bg-[#8A501C] hover:bg-[#7E3716] text-white px-6 py-2 rounded inline-block" href="https://mail.google.com/mail/?view=cm&fs=1&to=info@libreria.com&su=Pregunta" target="_blank">Contáctanos</a>
    </div>
</section>


@endsection