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
    public $miembros='';
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

    public function registrar()
    {
        $this->validar();
        DB::beginTransaction();
        try {
            //code...
            if ($this->verificaInscripcion() > 0) {
                $this->emit('error', 'Ya estas inscrito en esta actividad');
            } else {
                $inscripcion = new InscripcionModel();
                $inscripcion->nombre = $this->nombre;
                $inscripcion->correo = $this->correo;
                $inscripcion->telefono = $this->telefono;
                $inscripcion->carnet = $this->numero_carnet;
                $inscripcion->idActividad = $this->idActividad;
                $inscripcion->miembros = $this->miembros;
                $inscripcion->save();
                DB::commit();
                $this->emit('exito', 'Tu inscripcion se registro con exito');
                $this->limpiarDatos();
            }
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            $this->emit('error', 'Tu inscripcion fallo codigo de error ->' . $th->getMessage());
        }
    }
    public function validar()
    {
        return $this->validate(
            [
                'nombre' => 'required',
                'correo' => 'required|email',
                'telefono' => 'required|regex:/^\d{4}-\d{4}$/',
            ],
            [
                'nombre.required' => 'El nombre es obligatorio.',
                'correo.required' => 'El correo es obligatorio.',
                'correo.email' => 'El formato del correo no es válido.',
                'telefono.required' => 'El teléfono es obligatorio.',
                'telefono.regex' => 'El formato del teléfono debe ser 0000-0000.',
            ]
        );
    }
    public function limpiarDatos()
    {
        return redirect()->route('verificar_inscripcion');
    }

    public function verificaInscripcion()
    {
        return InscripcionModel::where('correo', $this->correo)->where('idActividad',$this->idActividad)->count();
    }
}
