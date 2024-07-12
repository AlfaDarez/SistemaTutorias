<?php

namespace App\Http\Controllers;
use App\Biblioteca;
use App\Dependencia;
use App\Http\Requests\UpdateContactoBDT;

use Illuminate\Http\Request;

class tutoresController extends Controller
{
    public function index(){
        $user = \Auth::user()->id;
        $bibliotecas = Biblioteca::get()->where('tutor_id',$user);
        return view('Tutor.index',compact('bibliotecas'));

    }

    public function actualizarContacto(UpdateContactoBDT $request,$id){
        return $request->all();

        $comentarios="";

        // Buscar el modelo de dependencia por su ID
        $Dependencia = Dependencia::get()->where('id',$id)->first();

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


    public function TutoriaNoefectiva(){

    }

    public function GuardarNoEfectiva(){

    }

    public function ContactoEfectivo(){

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
