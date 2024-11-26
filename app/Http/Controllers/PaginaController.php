<?php

namespace App\Http\Controllers;

use App\Models\ActividadModel;
use App\Models\InscripcionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function inscripcion_general(){
        return view('pages.inscripcion');
    }
    public function informe_inscritos($idActividad){
        $actividad = ActividadModel::where('idActividad', $idActividad)->first();
       // $inscritos = InscripcionModel::where('idActividad', $idActividad);
        $inscritos = DB::select('SELECT * FROM inscripcion where idActividad = ?',[$idActividad]);
        //var_dump($inscritos);
        return view('pages.informe-inscritos', compact('actividad', 'inscritos'));
    }
}
