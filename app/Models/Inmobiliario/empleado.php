<?php

namespace App\Models\Inmobiliario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class empleado extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'empleado';

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'num_ref',
        'email',
        'nivel',
        'vigencia'
    ];

    public function departamento()
    {
        return $this->belongsTo('App\Models\Inmobiliario\departamento','fk_departamento');
    }



    public function articulo()
    {
        return $this->belongsToMany('App\Models\Inmobiliario\articulo', 'articulo_has_empleado', 'fk_empleado', 'fk_articulo');

    }

    public function encargo()
    {
        return $this->belongsToMany('App\Models\Inmobiliario\encargo', 'articulo_has_empleado', 'fk_empleado', 'fk_encargo');

    }


}
