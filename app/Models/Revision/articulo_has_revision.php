<?php

namespace App\Models\Revision;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class articulo_has_revision extends Model
{
    use HasFactory;

    protected $table = "articulo_has_revision";

    protected $fillable = [
        'fk_revision',
        'fk_articulo'
    ];

    public $timestamps = false;

    public function articulo()
    {
        return $this->belongsTo('App\Models\Inmobiliario\articulo', 'fk_articulo','id');
    }

    public function revision()
    {
        return $this->belongsTo('App\Models\Revision\revision', 'fk_revision','id');
    }
}
