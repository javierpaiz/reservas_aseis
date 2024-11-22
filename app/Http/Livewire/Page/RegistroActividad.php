<?php

namespace App\Http\Livewire\Page;

use App\Models\InscripcionModel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RegistroActividad extends Component
{
    public $idActividad;
    public $nombre;
    public $telefono;
    public $correo;
    public $numero_carnet;
    public $integrantes;
    public $miembros;
    public function mount($idActividad)
    {
        $this->idActividad = $idActividad;
    }
    public function render()
    {
        $actividad = $this->getActividad();
        return view('livewire.page.registro-actividad', compact('actividad'));
    }
    public function getActividad()
    {
        return DB::select('SELECT * FROM actividad INNER JOIN tipo_actividad ON actividad.idTipoActividad = tipo_actividad.idTipoActividad 
            INNER JOIN categoria_atividad ON actividad.idCategoriaActividad = categoria_atividad.idcategoria WHERE actividad.idActividad = ?;', [$this->idActividad]);
    }

    public function registrar(){
        $this->validar();
        DB::beginTransaction();
        try {
            //code...
            $inscripcion = new InscripcionModel();
        $inscripcion->nombre=$this->nombre;
        $inscripcion->correo =$this->correo;
        $inscripcion->telefono =$this->telefono;
        $inscripcion->carnet =$this->numero_carnet;
        $inscripcion->idActividad = $this->idActividad;
        $inscripcion->miembros=$this->miembros;
        $inscripcion->save();
        DB::commit();
        $this->emit('exito', 'Tu inscripcion se registro con exito');

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            $this->emit('error', 'Tu inscripcion fallo codigo de error ->'.$th->getMessage());
        }
        



    }
    public function validar(){
        return $this->validate(['nombre'=>'required',
        'correo'=>'required',
        'telefono'=>'required',
        'numero_carnet'=>'required'],
        [
            'nombre.required' => 'El nombre es obligatorio.',
            'telefono.required' => 'El telefono es obligatorio.',
            'correo.required' => 'El correo es obligatorio.',
            'numero_carnet.required' => 'El numero de carnet es obligatorio.'
        ]);
    }
}
