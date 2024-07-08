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




}
