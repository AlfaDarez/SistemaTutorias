<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactoefectivo extends Model
{
    protected $fillable = [
        'id_bioblioteca',
        'id_tutor',
        'seguimiento',
        'actividadEnSistema',
        'resumenParaFichas',
        'fecha',
    ];


    public function tutor()
    {
        return $this->belongsTo(User::class, 'id_tutor');
    }

    public function biblioteca()
    {
        return $this->belongsTo(Biblioteca::class, 'id_bioblioteca');
    }




}
