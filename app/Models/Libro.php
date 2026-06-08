<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Autor;
use App\Models\Categoria;
use App\Models\DetallePedido;
use App\Models\CarritoCompra;
use App\Models\ListaDeseos;

class Libro extends Model
{
    // Nombre de la tabla en BD
    protected $table = 'libros';

    // Campos que se pueden rellenar masivamente
    protected $fillable = [
        'titulo',
        'descripcion',
        'precio',
        'stock',
        'activo',
        'descuento',
        'open_library_id',
        'isbn_13',
        'imagen',
        'editorial',
        'anio',
        'idioma',
        'num_paginas',
    ];

    // Casting de tipos de datos
    protected $casts = [
        'precio' => 'decimal:2',
        'descuento' => 'integer',
        'activo' => 'boolean',
    ];

    // Desactivar timestamps automáticos si no existen en la tabla
    public $timestamps = false;

    // Relaciones
    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'libro_autor')
                    ->withPivot('orden')
                    ->orderByPivot('orden');
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'libro_categoria');
    }

    public function detallesPedido()
    {
        return $this->hasMany(DetallePedido::class, 'libro_id');
    }

    public function carritoCompra()
    {
        return $this->hasMany(CarritoCompra::class, 'libro_id');
    }

    public function listaDeseos()
    {
        return $this->hasMany(ListaDeseos::class, 'libro_id');
    }
}
