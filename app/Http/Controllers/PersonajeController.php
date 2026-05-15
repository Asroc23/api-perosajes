<?php

namespace App\Http\Controllers;

use App\Models\Personaje;
use Illuminate\Http\Request;

class PersonajeController extends Controller
{
    // Mostrar todos los personajes
    public function index()
    {
        // Devolver todos los personajes en formato JSON
        return response()->json(
            Personaje::paginate(12) // 12 por página
        );
    }

    // Crear un nuevo personaje
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'anime' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'required|string|max:255',
            'imagen_fondo' => 'required|string|max:255',
            'nivel_poder' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'fecha_aparicion' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
        ]);
        // Crear el personaje en la base de datos
        $personaje = Personaje::create($validatedData);
        // Devolver una respuesta JSON con el personaje creado
        return response()->json([
            'mensaje' => 'Personaje creado correctamente',
            'data' => $personaje
        ], 201);
    }

    // Mostrar un personaje específico  
    public function show(Personaje $personaje)
    {
        // Devolver una respuesta JSON con el personaje solicitado
        return response()->json([
            'data' => $personaje
        ]);
    }

    // Actualizar un personaje específico
    public function update(Request $request, Personaje $personaje)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'anime' => 'sometimes|string|max:255',
            'descripcion' => 'sometimes|string',
            'imagen' => 'sometimes|string|max:255',
            'imagen_fondo' => 'sometimes|string|max:255',
            'nivel_poder' => 'sometimes|string|max:255',
            'genero' => 'sometimes|string|max:255',
            'fecha_aparicion' => 'sometimes|string|max:255',
            'estado' => 'sometimes|string|max:255',
        ]);
        // Actualizar el personaje en la base de datos
        $personaje->update($validatedData);
        // Devolver una respuesta JSON con el personaje actualizado
        return response()->json([
            'mensaje' => 'Personaje actualizado correctamente',
            'data' => $personaje
        ]);
    }

    // Eliminar un personaje específico
    public function destroy(Personaje $personaje)
    {
        $personaje->delete();
        return response()->json([
            'mensaje' => 'Personaje eliminado correctamente'
        ]);
    }
}
