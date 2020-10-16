<?php

namespace App\Models\Inmobiliario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class encargo extends Model
{
    use HasFactory;

    protected $table = 'encargo';

    protected $fillable = [
        'nombre',
        'vigencia'
    ];
}
