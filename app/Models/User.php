<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name_p',
        'last_name_m',
        'work_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function revision(){
        return $this->hasMany('App\Models\Revision\revision', 'fk_user','id');
    }

    public function disponibilidad_updated_by(){
        return $this->hasMany('App\Models\Inmobiliario\articulo', 'disponibilidad_updated_by','id');
    }

    public function updated_by(){
        return $this->hasMany('App\Models\Inmobiliario\articulo', 'updated_by','id');
    }
}
