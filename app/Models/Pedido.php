<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Usuarios;
use App\Models\DetallePedido;

class Pedido extends Model
{
    // Nombre de la tabla en BD
    protected $table = 'pedidos';

    // Campos que se pueden rellenar masivamente
    protected $fillable = [
        'numero_pedido',
        'usuario_id',
        'precio_total',
        'codigo_postal',
        'provincia',
        'poblacion',
        'calle',
        'numero',
        'planta',
        'puerta',
        'detalles',
    ];

    // Casting de tipos de datos
    protected $casts = [
        'precio_total' => 'decimal:2',
        'fecha_pedido' => 'datetime',
    ];

    // Nombre de la columna de timestamp de creación
    const CREATED_AT = 'fecha_pedido';
    const UPDATED_AT = null;

    // Relaciones
    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'usuario_id');
    }

    public function detalles()
    {
        return $this->hasMany(DetallePedido::class, 'pedido_id');
    }
}
