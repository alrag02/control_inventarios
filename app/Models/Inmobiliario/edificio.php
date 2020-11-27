<?php

namespace App\Models\Inmobiliario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class edificio extends Model
{
    use HasFactory;

    protected $table = 'edificio';

    protected $fillable = [
        'nombre',
        'vigencia'
    ];

    public function oficina()
    {
        return $this->hasMany('App\Models\Inmobiliario\oficina', 'fk_edificio','id');
    }
}
