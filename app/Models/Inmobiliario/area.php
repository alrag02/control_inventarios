<?php

namespace App\Models\Inmobiliario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class area extends Model
{
    use HasFactory;

    protected $table = 'area';

    protected $fillable = [
      'nombre',
      'vigencia'
    ];

    public function departamento()
    {
        return $this->hasMany(
            'App\Models\Inmobiliario\departamento',
            'fk_area',
            'id');
    }
}
