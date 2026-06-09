<!-- Modal Flotante -->
<div id="modalLibro" class="hidden fixed inset-0 z-50 items-center justify-center bg-black/50 p-4">
    <div class="bg-white rounded-lg shadow-2xl max-w-5xl w-full max-h-[85vh] overflow-y-auto">
        <!-- Botón Cerrar -->
        <button onclick="cerrarModal()" class="fixed top-4 right-4 z-10 bg-white text-gray-600 hover:text-gray-900 text-4xl w-10 h-10 flex items-center justify-center rounded-full shadow-lg">×</button>

        <!-- Contenido Principal -->
        <div class="flex gap-8 p-8">
            <!-- Imagen del Libro -->
            <div class="w-64 ">
                <img id="modalImagen" src="" alt="Portada" class="w-full rounded-lg shadow-lg mb-6">
                <div class="text-center">
                    <span id="modalStockBadge" class="inline-block px-4 py-2 bg-green-100 text-green-700 rounded-lg font-semibold text-sm"></span>
                </div>
            </div>

            <!-- Detalles del Libro (Derecha) -->
            <div class="flex-1">
                <!-- Título -->
                <h1 id="modalLibroTitulo" class="text-4xl font-bold text-gray-900 mb-6"></h1>

                <!-- Descripción -->
                <div class="mb-8">
                    <h3 class="text-sm text-gray-500 uppercase font-semibold mb-3">Descripción</h3>
                    <p id="modalDescripcion" class="text-gray-700 leading-relaxed text-justify"></p>
                </div>

                <!-- Categorías -->
                <div class="mb-8">
                    <h3 class="text-sm text-gray-500 uppercase font-semibold mb-3">Categorías</h3>
                    <div id="modalCategorias" class="flex flex-wrap gap-3"></div>
                </div>

                <!-- Info Rápida -->
                <div class="grid grid-cols-2 gap-6 mb-8 p-4 bg-gray-50 rounded-lg">
                    <div>
                        <p class="text-xs text-gray-500 uppercase font-semibold">Idioma</p>
                        <p id="modalIdioma" class="text-lg font-semibold text-gray-800"></p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase font-semibold">Páginas</p>
                        <p id="modalPaginas" class="text-lg font-semibold text-gray-800"></p>
                    </div>
                </div>

                <!-- Autores -->
                <div class="mb-6">
                    <h3 class="text-sm text-gray-500 uppercase font-semibold mb-2">Autores</h3>
                    <p id="modalAutores" class="text-lg text-gray-800 font-medium"></p>
                </div>

                <!-- Editorial -->
                <div class="mb-8">
                    <h3 class="text-sm text-gray-500 uppercase font-semibold mb-2">Editorial</h3>
                    <p id="modalEditorial" class="text-lg text-gray-800 font-medium"></p>
                </div>

                <!-- Precio y Botón -->
                <div class="flex items-center gap-6 pt-6 border-t">
                    <div>
                        <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Precio</p>
                        <div class="flex items-center gap-3">
                            <span id="modalPrecio" class="text-3xl font-bold text-[#8D5717]"></span>
                            <span id="modalDescuento" class="text-lg bg-red-100 text-red-600 px-4 py-1 rounded-full font-semibold hidden"></span>
                        </div>
                    </div>
                    <button id="btnAgregarAlCarrito" class="ml-auto px-8 py-3 bg-[#8D5717] text-white rounded-lg hover:bg-[#7E3716] font-semibold transition flex items-center gap-2">
                        <i class="bi bi-cart-plus"></i> Comprar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

