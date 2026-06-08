<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenLibraryService
{
    protected string $baseUrl = 'https://openlibrary.org';

    public function buscarLibros(string $query, int $limit = 40): array
    {
        $response = Http::timeout(10)->get("{$this->baseUrl}/search.json", [
            'q' => $query,
            'limit' => $limit,
        ]);

        if ($response->failed()) {
            return [];
        }

        return $response->json('docs', []);
    }

    public function librosAleatorios(int $total = 40): array
    {
        $temas = ['adventure', 'history', 'science', 'romance', 'mystery', 'fantasy', 'fiction', 'biography'];

        $libros = [];
        $porTema = (int)ceil($total / count($temas));

        foreach ($temas as $tema) {
            $items = $this->buscarLibros($tema, $porTema);
            foreach ($items as $item) {
                $key = $item['key'] ?? null;
                if ($key && !isset($libros[$key])) {
                    $libros[$key] = $item;
                }
            }
            if (count($libros) >= $total) {
                break;
            }
        }

        return array_slice(array_values($libros), 0, $total);
    }

    public function obtenerPortada(int $coverId, string $size = 'L'): ?string
    {
        return "https://covers.openlibrary.org/b/id/{$coverId}-{$size}.jpg";
    }
}
