<?php

namespace App\Models\Inmobiliario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class familia extends Model
{
    use HasFactory;

    protected $table = 'familia';

    protected $fillable = [
        'nombre',
        'sigla',
        'vigencia'
    ];

    public function articulo()
    {
        return $this->hasMany('App\Models\Inmobiliario\articulo', 'fk_familia','id');
    }

    public function foto()
    {
        return $this->hasMany('App\Models\Inmobiliario\foto', 'fk_familia','id');
    }
}
