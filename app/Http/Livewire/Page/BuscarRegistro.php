<?php

namespace App\Http\Livewire\Page;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BuscarRegistro extends Component
{
    public $actividad=[];
    public $correo;
    public function render()
    {
        return view('livewire.page.buscar-registro');
    }

    public function buscar_correo()
    {
        $this->validar();
        $this->actividad = $this->getActividad();
        if(count($this->actividad)==0){
            $this->emit('error','No econtramos registros con ese correo');
        }
    }
    public function validar()
    {
        return $this->validate(
            ['correo' => 'required'],
            [
                'correo.required' => 'El correo es obligatorio.'
            ]
        );
    }
    public function getActividad()
    {
        return DB::select('SELECT * FROM actividad INNER JOIN tipo_actividad ON actividad.idTipoActividad = tipo_actividad.idTipoActividad 
            INNER JOIN categoria_atividad ON actividad.idCategoriaActividad = categoria_atividad.idcategoria INNER JOIN inscripcion ON inscripcion.idActividad = actividad.idActividad WHERE inscripcion.correo = ?;', [$this->correo]);
    }
}
