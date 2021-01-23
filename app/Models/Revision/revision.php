<?php

namespace App\Models\Revision;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class revision extends Model
{
    use HasFactory;

    protected $table = 'revision';

    protected $fillable = [
        'fk_user',
        'fk_corte',
        'fk_departamento'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','fk_user');
    }

    public function corte()
    {
        return $this->belongsTo('App\Models\Revision\corte','fk_corte');
    }

    public function articulo()
    {
        return $this->hasMany('App\Models\Inmobiliario\articulo', 'fk_revision','id');
    }
    public function departamento()
    {
        return $this->hasMany('App\Models\Inmobiliario\departamento', 'fk_departamento','id');
    }
}
