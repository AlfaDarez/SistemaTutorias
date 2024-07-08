<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model
{
    protected $fillable = [
        'clavebdt',
        'iniciativa',
        'pertenencia',
        'escolarizado',
        'actividadPublica',
        'servicio',
        'claveMatutino',
        'nombreMatutino',
        'claveVespertino',
        'nombreVespertino',
        'estado',
        'municipio',
        'localidad',
        'domicilio',
        'codPostal',
        'lat',
        'long',
        'personal',
        'nomina',
        'maxParticipantes',
        'costoHabilitación',
        'fechaEntrega',
        'fechaInicioConvenio',
        'fechaTerminoConvenio',
        'convenioColaboracion',
        'convenioVencido',
        'sitiacionEquipo',
        'dependencia',
        'estatus',
        'estatus_temporal',
        'tutor_id'
    ];


    public function dependencias()
    {
        return $this->hasMany('App\Dependencia', 'id_biblioteca');
    }

    public function tutor()
    {
        return $this->belongsTo('App\User', 'tutor_id');
    }



}
