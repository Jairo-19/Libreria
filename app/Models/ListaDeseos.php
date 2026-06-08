<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Usuarios;
use App\Models\Libro;

class ListaDeseos extends Model
{
    // Nombre de la tabla en BD
    protected $table = 'lista_deseos';

    // Campos que se pueden rellenar masivamente
    protected $fillable = [
        'usuario_id',
        'libro_id',
    ];

    // Desactivar timestamps automáticos
    public $timestamps = false;

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
