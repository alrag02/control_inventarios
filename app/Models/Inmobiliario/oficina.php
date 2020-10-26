<?php

namespace App\Models\Inmobiliario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class oficina extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'oficina';

    protected $fillable = [
        'nombre',
        'fk_edificio',
        'planta',
        'vigencia'
    ];

    public function edificio()
    {
        return $this->belongsTo('App\Models\Inmobiliario\edificio','fk_edificio');
    }
}
