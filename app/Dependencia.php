<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    protected $fillable = [
        'id_biblioteca',
        'nombre_responsable',
        'cargo_responsable',
        'telefono_responsable',
        'celular_responsable',
        'correo_responsable',
        'nombre_encargado',
        'cargo_encargado',
        'telefono_encargado',
        'celular_encargado',
        'correo_encargado',
        'comentarios'
    ];

    public function biblioteca()
    {
        return $this->belongsTo('App\Biblioteca', 'id_biblioteca');
    }


}
