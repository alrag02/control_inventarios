<?php

namespace App\Models\Inmobiliario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class edificio extends Model
{
    use HasFactory;

    protected $table = 'edificio';

    protected $fillable = [
        'nombre',
        'vigencia'
    ];
}
