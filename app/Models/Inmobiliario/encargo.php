<?php

namespace App\Models\Inmobiliario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class encargo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'encargo';

    protected $fillable = [
        'nombre',
        'vigencia'
    ];
}
