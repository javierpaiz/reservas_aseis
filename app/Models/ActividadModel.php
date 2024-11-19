<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadModel extends Model
{
    use HasFactory;
    protected $table="actividad";
    public $timestamps = false;
    protected $fillable = [
        'idActividad',
        'nombreActividad',
        'descripcionActividad',
        'fecha',
        'hora',
        'idTipoActividad',
        'idCategoriaActividad'
        // Otros campos permitidos para asignación masiva
    ];
}
