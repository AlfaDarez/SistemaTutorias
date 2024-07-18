<?php

namespace App\Http\Controllers;
use App\Biblioteca;
use App\Dependencia;
use App\Http\Requests\UpdateContactoBDT;
use App\sincontacto;
use Carbon\Carbon;

use Illuminate\Http\Request;

class tutoresController extends Controller
{
    public function index(){
        $user = \Auth::user()->id;
        $bibliotecas = Biblioteca::get()->where('tutor_id',$user);

        return view('Tutor.index',compact('bibliotecas'));

    }

    public function actualizarContacto(UpdateContactoBDT $request,$id){

        $comentarios="";

        // Buscar el modelo de dependencia por su ID
        $Dependencia = Dependencia::get()->where('id_biblioteca',$id)->first();

                // Verificar si el modelo existe
            if (!$Dependencia) {

                  return redirect()->back()->with('error', 'Dependencia no encontrada.');
                }




         // Asignar los valores del request al modelo
        $Dependencia->nombre_responsable = $request->nombre_responsable;
        $Dependencia->cargo_responsable = $request->cargo_responsable;
        $Dependencia->telefono_responsable = $request->telefono_responsable;
        $Dependencia->celular_responsable = $request->celular_responsable;
        $Dependencia->correo_responsable = $request->correo_responsable;
        $Dependencia->nombre_encargado = $request->nombre_encargado;
        $Dependencia->cargo_encargado = $request->cargo_encargado;
        $Dependencia->telefono_encargado =$request->telefono_encargado;
        $Dependencia->celular_encargado = $request->celular_encargado;
        $Dependencia->correo_encargado = $request->correo_encargado;

        // Asignar comentarios o un valor por defecto
        if(isset($request->comentarios)){
            $comentarios ="No tiene comentarios";
        }else{
            $comentarios = $request->comentarios;
        }

        $Dependencia->comentarios = $comentarios;

        $Dependencia->save();

        return redirect()->back()->with('success', 'Dependencia actualizada exitosamente.');


    }



    public function TutoriaNoefectiva($id){
        $biblioteca = Biblioteca::find($id);

        return view('Tutor.Noefectiva',compact('biblioteca'));

    }



    public function GuardarNoEfectiva(Request $request)
    {


        // Guardar la nueva información
        $id_tutor = \Auth::user()->id;
        $fecha = Carbon::now();

        $sincontacto = new Sincontacto;
        $sincontacto->id_tutor = $id_tutor;
        $sincontacto->id_bioblioteca = $request->id_biblioteca;
        $sincontacto->fecha = $fecha;
        $sincontacto->motivo = $request->motivo;
        $sincontacto->observaciones = $request->observaciones;
        $sincontacto->save();



        return redirect()->route('tutor.index')->with('success', 'Tutoria Actualizada de Forma Exitosa.');
    }



    public function ContactoEfectivo($id){
        $biblioteca = Biblioteca::get()->where('clavebdt',$id);
        return $biblioteca;

    }









}
