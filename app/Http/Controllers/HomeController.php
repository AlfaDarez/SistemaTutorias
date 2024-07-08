<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(\Auth::user()->nivel ==1){
            return redirect()->route('tutor.index');
        }else if(\Auth::user()->nivel ==2){
            return view('Administrador.index');
        }else if(\Auth::user()->nivel ==3){
            return view('Jefe.index');
        }else if(\Auth::user()->nivel ==4){
            return view('Suspendido.index');
        }else{
            return view('errors.404', [], 404);
        }

    }
}
