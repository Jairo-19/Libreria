<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenLibraryService
{
    protected string $baseUrl = 'https://openlibrary.org';

    public function buscarLibros(string $query, int $limit = 40): array
    {
        $response = Http::get("{$this->baseUrl}/search.json", [
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
        $temas = [
            'adventure', 'history', 'science', 'romance', 'mystery',
            'fantasy', 'philosophy', 'art', 'music', 'nature',
            'fiction', 'biography', 'poetry', 'technology', 'travel',
            'sport', 'cooking', 'business', 'education', 'health',
        ];

        $libros = [];
        $porTema = max(1, intdiv($total, count($temas)));

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

        return array_values($libros);
    }

    public function obtenerPortada(int $coverId, string $size = 'L'): ?string
    {
        return "https://covers.openlibrary.org/b/id/{$coverId}-{$size}.jpg";
    }
}
