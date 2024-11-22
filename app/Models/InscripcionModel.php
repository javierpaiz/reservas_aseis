<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscripcionModel extends Model
{
    use HasFactory;
    protected $table="inscripcion";
    public $timestamps = false;
    protected $fillable = [
        'idInscripcion',
        'nombre',
        'telefono',
        'correo',
        'carnet',
        'idActividad',
        'miembros'
        // Otros campos permitidos para asignación masiva
    ];
}
