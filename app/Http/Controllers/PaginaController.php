<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaController extends Controller
{
    //
    public function pagina(){
        return view('pages.index');
    }
    public function registrar_actividad($idActividad){
        return view('pages.registro', compact('idActividad'));
    }
    public function verificar_inscripcion(){
        return view('pages.buscar');
    }
}
