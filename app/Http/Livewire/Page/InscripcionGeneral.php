<?php

namespace App\Http\Livewire\Page;

use App\Models\ActividadModel;
use App\Models\InscripcionModel;
use Livewire\Component;

class InscripcionGeneral extends Component
{
    public $actividades;
    public function render()
    {
        $this->actividades = $this->getActividades();
        return view('livewire.page.inscripcion-general');
    }
    public function getActividades(){
        return ActividadModel::orderBy('fecha', 'asc')->get();
    }

    public function verificaInscripcion($idActividad){
        return InscripcionModel::where('idActividad',$idActividad)->count();
    }
}
