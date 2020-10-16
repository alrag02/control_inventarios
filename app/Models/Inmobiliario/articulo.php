<?php

namespace App\Models\Inmobiliario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class articulo extends Model
{
    use HasFactory;

    protected $table = 'articulo';

    protected $fillable = [
        'etiqueta_local',
        'etiqueta_externa',
        'concepto',
        'marca',
        'modelo',
        'descripcion',
        'numero_serie',
        'color',
        'cantidad',
        'placas',
        'observaciones',
        'fecha_adquisiscion',
        'costo',
        'num_factura',
        'activo_resguardo'
    ];
}
