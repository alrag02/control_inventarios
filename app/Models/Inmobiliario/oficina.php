<?php

namespace App\Models\Inmobiliario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oficina extends Model
{
    use HasFactory;

    protected $table = 'oficina';

    protected $fillable = [
        'nombre',
        'fk_edificio',
        'planta',
        'vigencia'
    ];
}
