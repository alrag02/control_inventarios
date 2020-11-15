<?php

namespace App\Models\Revision;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class disponibilidad_articulo extends Model
{
    use HasFactory;

    protected $table = 'disponibilidad_articulo';

    protected $fillable = [
        'estado',
        'fk_articulo',
        'fk_revision',
    ];

    public function articulo(){
        return $this->belongsTo('App\Models\Inmobiliario\articulo','fk_articulo');
    }

    public function revision(){
        return $this->belongsTo('App\Models\Revision\revision','fk_revision');
    }
}
