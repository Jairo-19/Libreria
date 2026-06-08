<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Usuarios;
use App\Models\Libro;

class CarritoCompra extends Model
{
    // Nombre de la tabla en BD
    protected $table = 'carrito_compra';

    // Campos que se pueden rellenar masivamente
    protected $fillable = [
        'usuario_id',
        'libro_id',
        'cantidad',
    ];

    // Casting de tipos de datos
    protected $casts = [
        'fecha_agregado' => 'datetime',
    ];

    // Nombre de la columna de timestamp de creación
    const CREATED_AT = 'fecha_agregado';
    const UPDATED_AT = null;

    // Relaciones
    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'usuario_id');
    }

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'libro_id');
    }
}
