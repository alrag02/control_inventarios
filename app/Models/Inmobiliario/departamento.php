<?php

namespace App\Models\Inmobiliario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    use HasFactory;

    protected $table = 'departamento';

    protected $fillable = [
        'nombre',
        'vigencia',
        'fk_area',
        'num_ref',
        'email',
        'nivel',

    ];
}
