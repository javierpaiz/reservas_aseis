<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;

class Prueba extends Component
{
    public $contador=0;
    public function render()
    {
        return view('livewire.page.prueba');
    }
    public function contar(){
        $this->contador++;
    }
}
