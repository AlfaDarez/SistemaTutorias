<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'telefono',
        'celular',
        'password',
        'casaTutora',
        'nivel',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bibliotecas()
    {
        return $this->hasMany('App\Biblioteca', 'tutor_id');
    }

    public function sinContactos()
    {
        return $this->hasMany(SinContacto::class, 'id_tutor');
    }


    public function contactoEfectivo()
    {
        return $this->hasMany(contactoEfectivo::class, 'id_tutor');
    }


}
