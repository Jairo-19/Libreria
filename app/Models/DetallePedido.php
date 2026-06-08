<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;
use App\Models\Libro;

class DetallePedido extends Model
{
    // Nombre de la tabla en BD
    protected $table = 'detalle_pedido';

    // Campos que se pueden rellenar masivamente
    protected $fillable = [
        'pedido_id',
        'libro_id',
        'cantidad',
        'precio_unitario',
    ];

    // Casting de tipos de datos
    protected $casts = [
        'precio_unitario' => 'decimal:2',
    ];

    // Desactivar timestamps automáticos
    public $timestamps = false;

    // Relaciones
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'libro_id');
    }
}
