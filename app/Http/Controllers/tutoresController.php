<?php

namespace App\Http\Controllers;
use App\Biblioteca;
use App\Dependencia;

use Illuminate\Http\Request;

class tutoresController extends Controller
{
    public function index(){
        $user = \Auth::user()->id;
        $bibliotecas = Biblioteca::get()->where('tutor_id',$user);
        return view('Tutor.index',compact('bibliotecas'));

    }

    public function mostrarContactos($id, Request $request){

        $user = \Auth::user()->id;
        $bibliotecas = Biblioteca::get()->where('tutor_id',$user);
        $dependencia = Dependencia::get()->where('id_biblioteca',$id);

        if ($request->ajax()) {
            // Retornar una respuesta JSON
            return response()->json([
                'success' => true,
                'dependencia' => $dependencia
            ]);
        }
        return view('Tutor.index',compact('bibliotecas','dependencia'));

    }



}
