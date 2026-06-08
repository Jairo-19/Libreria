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

        <div class="relative">
            @auth
                <button id="userMenuBtn" class="focus:outline-none">
                    <i class="bi bi-person-circle text-3xl cursor-pointer hover:text-[#8D5717] transition"></i>
                </button>
                <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border py-1 z-50">
                    <a href="{{ url('/perfil') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                        <i class="bi bi-person-fill"></i>
                        Mi perfil
                    </a>
                    <a href="{{ url('/lista-deseos') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                        <i class="bi bi-heart"></i>
                        Lista de deseos
                    </a>
                    <a href="{{ url('/carrito') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                        <i class="bi bi-cart"></i>
                        Carrito
                    </a>
                    <a href="{{ url('/ajustes') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                        <i class="bi bi-gear"></i>
                        Ajustes
                    </a>
                    <hr class="my-1 border-gray-200">
                    <a href="{{ route('logout') }}"
                       class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-left"></i>
                        Cerrar sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}">
                    <i class="bi bi-person-circle text-3xl cursor-pointer hover:text-[#8D5717] transition"></i>
                </a>
            @endauth
        </div>

    </div>

</header>