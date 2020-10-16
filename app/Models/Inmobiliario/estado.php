<?php

namespace App\Models\Inmobiliario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estado extends Model
{
    use HasFactory;

    protected $table = 'estado';

    protected $fillable = [
        'nombre',
        'vigencia'
    ];
}
