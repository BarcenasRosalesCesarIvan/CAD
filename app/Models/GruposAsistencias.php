<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GruposAsistencias extends Model
{
    public function guardarAsistencia(Request $request)
{
    // Recupera los datos del formulario
    $asistencias = $request->input('asistencias');
    $observaciones = $request->input('observaciones');

    // Obtiene la fecha y hora actual del servidor
    $fechaHora = now();

    // Itera sobre los registros obtenidos de la consulta y guárdalos en la tabla GruposAsistencias
    foreach ($registros as $registro) {
        if ($registro->dia_semana == 6) {
            GruposAsistencias::create([
                'clave_materia' => $registro->clave_materia,
                'clave_plan_estudios' => $registro->clave_plan_estudios,
                ''
                'dia_semana' => $registro->dia_semana, // Agrega el campo dia_semana
                'fecha_hora' => $fechaHora, // Agrega el campo fecha_hora
                // Otros campos necesarios
            ]);
        }
    }

    // Redirige o muestra una vista de confirmación
    return redirect()->route('ruta.de.confirmacion');
}
}
