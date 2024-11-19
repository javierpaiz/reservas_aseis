<?php

namespace App\Http\Livewire\Page;

use App\Models\ActividadModel;
use Livewire\Component;

class ActividadesInscripcion extends Component
{
    public function render()
    {
        $dataActividad = $this->getActividades();
        return view('livewire.page.actividades-inscripcion', compact('dataActividad'));
    }

    public function getActividades(){
        return ActividadModel::all();
    }
}
