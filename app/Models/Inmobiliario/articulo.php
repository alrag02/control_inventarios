<?php

namespace App\Models\Inmobiliario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class articulo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'articulo';

    protected $fillable = [
        'etiqueta_local',
        'etiqueta_externa',
        'concepto',
        'marca',
        'modelo',
        'descripcion',
        'numero_serie',
        'color',
        'cantidad',
        'placas',
        'observaciones',
        'fecha_adquisiscion',
        'costo',
        'num_factura',
        'activo_resguardo',
        'fk_familia',
        'fk_departamento',
        'fk_estado',
        'fk_tipo_compra',
        'fk_tipo_equipo',
        'fk_oficina',
        'vigencia'
    ];

    public function departamento()
    {
        return $this->belongsTo('App\Models\Inmobiliario\departamento','fk_departamento');
    }

    public function estado()
    {
        return $this->belongsTo('App\Models\Inmobiliario\estado','fk_estado');
    }

    public function tipo_compra()
    {
        return $this->belongsTo('App\Models\Inmobiliario\tipo_compra','fk_tipo_compra');
    }

    public function tipo_equipo()
    {
        return $this->belongsTo('App\Models\Inmobiliario\tipo_equipo','fk_tipo_equipo');
    }

    public function oficina()
    {
        return $this->belongsTo('App\Models\Inmobiliario\oficina','fk_oficina');
    }

    public function familia()
    {
        return $this->belongsTo('App\Models\Inmobiliario\familia','fk_familia');
    }

    public function empleado()
    {
        return $this->belongsToMany('App\Models\Inmobiliario\empleado', 'articulo_has_empleado', 'fk_articulo', 'fk_empleado');

    }

    public function encargo()
    {
        return $this->belongsToMany('App\Models\Inmobiliario\encargo', 'articulo_has_empleado', 'fk_articulo', 'fk_encargo');

    }

    //Obtener los datos separadas de las fechas, esto para poder general las etiquetas con el año de
    //adquisisción,
    public function getDates()
    {
        //define the datetime table column names as below in an array, and you will get the
        //carbon objects for these fields in model objects.

        return array('created_at', 'updated_at','fecha_adquisiscion');
    }

    public function disponibilidad_articulo(){
        return $this->hasMany('App\Models\Revision\disponibilidad_articulo', 'fk_articulo','id');
    }
}
