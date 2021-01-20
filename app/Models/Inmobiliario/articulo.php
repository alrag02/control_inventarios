<?php

namespace App\Models\Inmobiliario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class articulo extends Model
{
    use HasFactory;

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
        'empleado_encargado_area',
        'empleado_titular',
        'empleado_titular_secundario',
        'empleado_resguardo',
        'empleado_resguardo_secundario',
        'fk_familia',
        'fk_departamento',
        'fk_estado',
        'fk_tipo_compra',
        'fk_tipo_equipo',
        'fk_oficina',
        'fk_revision',
        'vigencia',
        'disponibilidad',
        'disponibilidad_updated_at'

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
    /*
    public function empleado()
    {
        return $this->belongsToMany('App\Models\Inmobiliario\empleado', 'articulo_has_empleado', 'fk_articulo', 'fk_empleado');
    }
    */

    public function empleado_encargado_area()
    {
        return $this->belongsTo('App\Models\Inmobiliario\empleado', 'empleado_encargado_area');
    }

    public function empleado_titular()
    {
        return $this->belongsTo('App\Models\Inmobiliario\empleado', 'empleado_titular');
    }

    public function empleado_titular_secundario()
    {
        return $this->belongsTo('App\Models\Inmobiliario\empleado', 'empleado_titular_secundario');
    }

    public function empleado_resguardo()
    {
        return $this->belongsTo('App\Models\Inmobiliario\empleado', 'empleado_resguardo');
    }

    public function empleado_resguardo_secundario()
    {
        return $this->belongsTo('App\Models\Inmobiliario\empleado', 'empleado_resguardo_secundario');

    }

    public function foto(){
        return $this->belongsTo('App\Models\Inmobiliario\foto', 'fk_foto');
    }

    /*
    public function encargo()
    {
        return $this->belongsToMany('App\Models\Inmobiliario\encargo', 'articulo_has_empleado', 'fk_articulo', 'fk_encargo');

    }*/

    //Obtener los datos separadas de las fechas, esto para poder general las etiquetas con el año de
    //adquisisción,
    public function getDates()
    {
        //define the datetime table column names as below in an array, and you will get the
        //carbon objects for these fields in model objects.

        return array('created_at', 'updated_at','fecha_adquisiscion','disponibilidad_updated_at');
    }

    public function revision(){
        return $this->belongsTo('App\Models\Revision\revision','fk_revision');
    }
}
