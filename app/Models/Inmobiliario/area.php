<?php

namespace App\Models\Inmobiliario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class area extends Model
{
    use HasFactory;

    protected $table = 'area';

    protected $fillable = [
      'nombre',
      'vigencia'
    ];
}
