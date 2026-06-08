<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Pedido;
use App\Models\CarritoCompra;
use App\Models\ListaDeseos;

class Usuarios extends Authenticatable
{
    // Nombre de la tabla en BD
    protected $table = 'usuarios';

    // La tabla no tiene created_at ni updated_at
    public $timestamps = false;

    // Campos que se pueden rellenar masivamente
    protected $fillable = [
        'nombre',
        'apellido_1',
        'apellido_2',
        'email',
        'password',
        'rol',
        'telefono',
    ];

    // Campos que se ocultan al serializar (ej. JSON)
    protected $hidden = [
        'password',
    ];

    // Casting de tipos de datos
    protected $casts = [
        'fecha_registro' => 'datetime',
    ];

    // Relaciones
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'usuario_id');
    }

    public function carritoCompra()
    {
        return $this->hasMany(CarritoCompra::class, 'usuario_id');
    }

    public function listaDeseos()
    {
        return $this->hasMany(ListaDeseos::class, 'usuario_id');
    }
}
