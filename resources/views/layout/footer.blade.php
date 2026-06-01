<footer class="bg-[#1B1816] text-white px-6 py-10">
    
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">

        <!-- Logo -->
        <div class="flex flex-col items-start gap-3 ">
            <img src="{{ asset('imagenes/logo.png') }}" alt="Logo de la librería" class="h-24 w-auto">
        </div>

        <!-- Navegación -->
        <div>
            <h2 class="text-[#8D5717] text-lg font-semibold mb-4">Navegación</h2>
            
            <nav>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ url('/') }}"
                           class="text-gray-300 hover:text-[#8D5717] transition cursor-pointer">
                            Inicio
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/libros') }}"
                           class="text-gray-300 hover:text-[#8D5717] transition cursor-pointer">
                            Libros
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/contacto') }}"
                           class="text-gray-300 hover:text-[#8D5717] transition cursor-pointer">
                            Contacto
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Redes sociales -->
        <div>
            <h2 class="text-[#8D5717] text-lg font-semibold mb-4">
                Síguenos en redes
            </h2>

            <div class="flex gap-4 text-2xl">
                <i class="bi bi-instagram cursor-pointer hover:text-[#8D5717] transition"></i>
                <i class="bi bi-facebook cursor-pointer hover:text-[#8D5717] transition"></i>
                <i class="bi bi-twitter cursor-pointer hover:text-[#8D5717] transition"></i>
            </div>
        </div>

    </div>

    <!-- Línea separadora -->
    <hr class="border-gray-700 my-8 mx-auto w-1/2">

    <!-- Copyright -->
    <div class="text-center text-sm text-gray-500">
        &copy; 2026 Verso & Prosa. Todos los derechos reservados.
    </div>

</footer>