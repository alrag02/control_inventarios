<?php

namespace App\Models\Inmobiliario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class empleado extends Model
{
    use HasFactory;

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

    public function empleado_encargado_area()
    {
        return $this->HasMany('App\Models\Inmobiliario\articulo', 'empleado_encargado_area', 'id');
    }

    public function empleado_titular()
    {
        return $this->HasMany('App\Models\Inmobiliario\articulo', 'empleado_titular', 'id');
    }

    public function empleado_titular_secundario()
    {
        return $this->HasMany('App\Models\Inmobiliario\articulo', 'empleado_titular_secundario','id');
    }

    public function empleado_resguardo()
    {
        return $this->HasMany('App\Models\Inmobiliario\articulo', 'empleado_resguardo','id');
    }

    public function empleado_resguardo_secundario()
    {
        return $this->HasMany('App\Models\Inmobiliario\articulo', 'empleado_resguardo_secundario','id');

    }

    /*public function encargo()
    {
        return $this->belongsToMany('App\Models\Inmobiliario\encargo', 'articulo_has_empleado', 'fk_empleado', 'fk_encargo');

    }*/


}
