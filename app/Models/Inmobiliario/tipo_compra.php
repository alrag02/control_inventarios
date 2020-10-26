<?php

namespace App\Models\Inmobiliario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tipo_compra extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tipo_compra';

    protected $fillable = [
        'nombre',
        'sigla',
        'vigencia'
    ];
}
