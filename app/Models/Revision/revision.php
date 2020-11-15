<?php

namespace App\Models\Revision;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class revision extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'revision';

    protected $fillable = [
        'fk_user',
        'fk_corte',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','fk_user');
    }

    public function corte()
    {
        return $this->belongsTo('App\Models\Revision\corte','fk_corte');
    }
}
