<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personaje extends Model
{
    use HasFactory;
    
    // Especificar los campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'anime',
        'descripcion',
        'imagen',
        'imagen_fondo',
        'nivel_poder',
        'genero',
        'fecha_aparicion',
        'estado'
    ];
}
