<?php

namespace App;
use App\contactoefectivo;
use App\sincontacto;
use Carbon\Carbon;


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

    public function sinContactos()
    {
        return $this->hasMany(SinContacto::class, 'id_bioblioteca');
    }

    public function contactoEfectivo()
    {
        return $this->hasMany(contactoEfectivo::class, 'id_bioblioteca');
    }

    public function UltimoContacto($id){

        // Obtener el último contacto efectivo basado en la fecha más reciente
        $exitosa = contactoefectivo::where('id_bioblioteca', $id)->orderBy('fecha', 'desc')->first();

        // Obtener el último contacto no efectivo basado en la fecha más reciente
        $noExitosa = sincontacto::where('id_bioblioteca', $id)->orderBy('fecha', 'desc')->first();

        // Convertir las fechas a objetos Carbon si existen
        $fecha_exitosa = $exitosa ? Carbon::parse($exitosa->fecha) : null;
        $fecha_NoExitosa = $noExitosa ? Carbon::parse($noExitosa->fecha) : null;

        // Verificar y retornar según los requisitos
        if (!$fecha_exitosa && !$fecha_NoExitosa) {
            return "Sin llamadas";
        }

        if ($fecha_exitosa && !$fecha_NoExitosa) {
            return $fecha_exitosa->toDateString();
        }

        if (!$fecha_exitosa && $fecha_NoExitosa) {
            return $fecha_NoExitosa->toDateString();
        }

        // Comparar las dos fechas y retornar la más reciente
        if ($fecha_exitosa->greaterThan($fecha_NoExitosa)) {
            return $fecha_exitosa->toDateString();
        } else {
            return $fecha_NoExitosa->toDateString();
        }

    }
    public function Historico($id){
        $exitosas = contactoefectivo::where('id_bioblioteca', $id)->get();
        $noExitosas = sincontacto::where('id_bioblioteca', $id)->get();

        $data = [
            'fallidos' => $noExitosas,
            'exitoso' => $exitosas
        ];

        $llamadas = [];
        $historico = [];

        // obtención datos llamada
        foreach ($data as $estados) {
            foreach ($estados as $estado ) {
                // Fecha
                array_push($llamadas, $estado->fecha);

                // Tutor->nombre
                array_push($llamadas, $estado->tutor->name);

                // mensaje
                if (($estado->observaciones) == null) {
                    array_push($llamadas, $estado->seguimiento);
                } else {
                    array_push($llamadas, $estado->observaciones);
                }

                array_push($historico, $llamadas);
                $llamadas = [];
            }
        }
        return $historico;
    }
    public function dependenciasContacto($id){
        $dependencia = Dependencia::where('id_biblioteca', $id)->get();
        return $dependencia;
    }

}
