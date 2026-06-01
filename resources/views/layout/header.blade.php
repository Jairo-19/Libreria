<header class="flex items-center justify-between px-6 py-4 shadow-md z-50 relative">

    <div class="flex items-center gap-3">
        <a href="{{ url('/') }}">
            <img src="{{ asset('imagenes/logo.png') }}" alt="Logo de la librería" class="h-16">
        </a>
            <h1 class="text-2xl font-bold">Verso & <span class="text-[#8D5717]">Prosa</span></h1>
        
    </div>
    <div class="flex items-center gap-8">
        <nav>
            <ul class="flex items-center gap-6 ">
                <li>
                    <a href="{{ url('/') }}" class="hover:text-[#8D5717] hover:border-b-4 hover:border-[#8D5717] transition pb-1">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ url('/libros') }}" class="hover:text-[#8D5717] hover:border-b-4 hover:border-[#8D5717] transition pb-1">
                        Libros
                    </a>
                </li>
                <li>
                    <a href="{{ url('/contacto') }}" class="hover:text-[#8D5717] hover:border-b-4 hover:border-[#8D5717] transition pb-1">
                        Contacto
                    </a>
                </li>
            </ul>
        </nav>

        <div>
            <i class="bi bi-person-circle text-3xl cursor-pointer hover:text-[#8D5717] transition"></i>
        </div>
    </div>

</header>