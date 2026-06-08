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

    public function obtenerPortada(int $coverId, string $size = 'L'): ?string
    {
        return "https://covers.openlibrary.org/b/id/{$coverId}-{$size}.jpg";
    }
}
