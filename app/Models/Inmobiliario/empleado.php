<?php

namespace App\Models\Inmobiliario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
    use HasFactory;

    protected $table = 'empleado';

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'num_ref',
        'email',
        'nivel',
        'vigencia'
    ];
}
