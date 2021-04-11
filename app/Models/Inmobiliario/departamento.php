<?php

namespace App\Models\Inmobiliario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class departamento extends Model
{
    use HasFactory;

    protected $table = 'departamento';

    protected $fillable = [
        'nombre',
        'vigencia',
        'fk_area',
        'num_ref',
        'email',
        'nivel',

    ];

    public function area()
    {
        return $this->belongsTo('App\Models\Inmobiliario\area','fk_area');
    }

    public function empleado()
    {
        return $this->hasMany('App\Models\Inmobiliario\empleado', 'fk_departamento','id');
    }

    public function articulo()
    {
        return $this->hasMany('App\Models\Inmobiliario\articulo', 'fk_departamento','id');
    }


}
