<header>
    <div>
        <img src="{{ asset('imagenes/logo.png') }}" alt="Logo de la librería" class="h-16">
        <h1>Verso & Prosa</h1>
    </div>

    <nav>
        <ul class="flex space-x-4">
            <li><a href="{{ url('/') }}" class="">Inicio</a></li>
            <li><a href="{{ url('/libros') }}" class="">Libros</a></li>
            <li><a href="{{ url('/contacto') }}" class="">Contacto</a></li>
        </ul>
    </nav>

    <div>
        <i class="bi bi-person-circle"></i>
    </div>
</header>