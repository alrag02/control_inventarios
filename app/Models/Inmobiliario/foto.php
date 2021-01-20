<?php

namespace App\Models\inmobiliario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class foto extends Model
{
    use HasFactory;

    protected $table = 'foto';

    protected $fillable = [
        'name',
        'image',
        'fk_familia'
    ];

    public function articulo()
    {
        return $this->hasMany('App\Models\Inmobiliario\articulo', 'fk_foto','id');
    }

    public function familia()
    {
        return $this->belongsTo('App\Models\Inmobiliario\familia','fk_familia');
    }
}
