<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\OpenLibraryService;
use App\Models\Libro;

class ImportarLibros extends Command
{
    protected $signature = 'libros:importar {query?}';
    protected $description = 'Importa libros desde Open Library API';

    public function handle(OpenLibraryService $service): void
    {
        $query = $this->argument('query');

        if ($query) {
            $this->info("Buscando: $query...");
            $items = $service->buscarLibros($query, 40);
        } else {
            $this->info("Importando libros aleatorios de diversos temas...");
            $items = $service->librosAleatorios(40);
        }

        if (empty($items)) {
            $this->error('No se encontraron resultados o falló la API.');
            return;
        }

        $insertados = 0;

        foreach ($items as $doc) {
            $openLibraryId = $doc['key'] ?? null;
            if (!$openLibraryId) {
                continue;
            }

            $coverId = $doc['cover_i'] ?? null;

            $descuentos = [0, 0, 0, 0, 5, 5, 10, 10, 15, 20, 25, 30];

            Libro::updateOrCreate(
                ['open_library_id' => $openLibraryId],
                [
                    'titulo' => $doc['title'] ?? 'Sin título',
                    'descripcion' => null,
                    'precio' => mt_rand(599, 4999) / 100,
                    'descuento' => $descuentos[array_rand($descuentos)],
                    'stock' => mt_rand(5, 100),
                    'activo' => true,
                    'isbn_13' => $doc['isbn'][0] ?? null,
                    'imagen' => $coverId ? $service->obtenerPortada($coverId) : null,
                    'editorial' => $doc['publisher'][0] ?? null,
                    'anio' => $doc['first_publish_year'] ?? null,
                    'idioma' => $doc['language'][0] ?? null,
                    'num_paginas' => $doc['number_of_pages_median'] ?? null,
                ]
            );

            $insertados++;
        }

        $this->info("$insertados libros importados/actualizados.");
    }
}
