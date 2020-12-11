<?php

namespace App\Models\Inmobiliario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class encargo extends Model
{
    use HasFactory;

   /* protected $table = 'encargo';

    protected $fillable = [
        'nombre',
        'vigencia'
    ];

    public function articulo()
    {
        return $this->belongsToMany('App\Models\Inmobiliario\articulo', 'articulo_has_empleado', 'fk_encargo', 'fk_articulo');

    }

    public function empleado()
    {
        return $this->belongsToMany('App\Models\Inmobiliario\empleado', 'articulo_has_empleado', 'fk_encargo', 'fk_empleado');

    }
   */
}
