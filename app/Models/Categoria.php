<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Libro;

class Categoria extends Model
{
    // Nombre de la tabla en BD
    protected $table = 'categorias';

    // Campos que se pueden rellenar masivamente
    protected $fillable = [
        'nombre',
    ];

    // Desactivar timestamps automáticos
    public $timestamps = false;

    // Relaciones
    public function libros()
    {
        return $this->belongsToMany(Libro::class, 'libro_categoria');
    }
}
