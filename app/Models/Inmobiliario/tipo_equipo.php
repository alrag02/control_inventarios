<?php

namespace App\Models\Inmobiliario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_equipo extends Model
{
    use HasFactory;

    protected $table = 'tipo_compra';

    protected $fillable = [
        'nombre',
        'siglas',
        'vigencia'
    ];
}
