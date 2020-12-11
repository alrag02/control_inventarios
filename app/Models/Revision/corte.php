<?php

namespace App\Models\Revision;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class corte extends Model
{
    use HasFactory;
    protected $table = 'corte';

    protected $fillable = [
        'nombre',
        'descripcion'
    ];
    /**
     * @var mixed
     */

    public function revision(){
        return $this->hasMany('App\Models\Revision\revision', 'fk_revision','id');
    }

}
