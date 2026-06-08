<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Libro;

class Autor extends Model
{
    // Nombre de la tabla en BD
    protected $table = 'autores';

    // Campos que se pueden rellenar masivamente
    protected $fillable = [
        'nombre_completo',
    ];

    // Desactivar timestamps automáticos
    public $timestamps = false;

    // Relaciones
    public function libros()
    {
        return $this->belongsToMany(Libro::class, 'libro_autor')
                    ->withPivot('orden')
                    ->orderByPivot('orden');
    }
}
