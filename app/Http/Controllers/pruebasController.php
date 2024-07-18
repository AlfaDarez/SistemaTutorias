<?php

namespace App\Http\Controllers;
use App\Biblioteca;
use App\Dependencia;
use App\Http\Requests\UpdateContactoBDT;
use App\sincontacto;
use App\contactoefectivo;
use Illuminate\Http\Request;

class pruebasController extends Controller
{
    public function index(){
        $user = \Auth::user()->id;
        $bibliotecas = Biblioteca::get()->where('tutor_id',$user);
        return view('Pruebas.index',compact('bibliotecas'));
    }

    public function FormularioActualizarContacto($id){

        $biblioteca = Dependencia::get()->where('id_biblioteca',$id);

        // Adiciones
        $id_biblioteca = $id - 1;//-1 para coincidencias con el [index]
        $user = \Auth::user()->id;
        $bibliotecas = Biblioteca::get()->where('tutor_id',$user);

        return view('Tutor.Actualizar.contactos',compact('bibliotecas','biblioteca','id_biblioteca'));

    }

}
