<?php

namespace App\Http\Livewire\Page;

use App\Models\ActividadModel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ActividadesInscripcion extends Component
{
    public function render()
    {
        $dataActividad = $this->getActividades();
        return view('livewire.page.actividades-inscripcion', compact('dataActividad'));
    }

    public function getActividades()
    {
        return DB::select('SELECT * FROM actividad INNER JOIN tipo_actividad ON actividad.idTipoActividad = tipo_actividad.idTipoActividad 
            INNER JOIN categoria_atividad ON actividad.idCategoriaActividad = categoria_atividad.idcategoria');
    }
}
