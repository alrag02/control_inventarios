<?php

namespace App\Models\Inmobiliario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class estado extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'estado';

    protected $fillable = [
        'nombre',
        'vigencia'
    ];

    public function articulo()
    {
        return $this->hasMany('App\Models\Inmobiliario\articulo', 'fk_estado','id');
    }
}
