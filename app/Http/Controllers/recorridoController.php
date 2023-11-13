<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\GruposAsistencias; 


class RecorridoController extends Controller
{
    public function index()
    {
        // Establecer la zona horaria local de México
        date_default_timezone_set('America/Mexico_City');
    
        // Obtener la hora actual en la zona horaria local
        $horaActual = Carbon::now();
    
        // Calcular la hora de finalización deseada (la próxima hora en punto)
        $horaFinDeseada = $horaActual->copy()->addHour(2)->startOfHour();
    
        // Calcula la hora de búsqueda
        $horaBuscada = Carbon::now()->setTime(15, 43, 0);
    
        // Obtener el día de la semana actual (miércoles tiene un valor de 4)
        $diaSemanaActual = now()->dayOfWeek + 1; // +1 para ajustar el valor al rango 1-7
    
        // Consulta SQL para obtener los registros que cumplen con los criterios
        $registros = DB::table('grupos_horarios as gh')
    ->select('gh.clave_materia', 'm.nombre_materia', 'gh.hora_inicio', 'gh.hora_fin', 'a.aula', 'a.edificio','g.letra_grupo', 'p.rfc', DB::raw("CONCAT(p.nombre, ' ', p.ap_paterno, ' ', p.ap_materno) as 'Nombre Docente'"))
    ->join('aulas as a', 'gh.aula', '=', 'a.aula')
    ->join('materias as m', function ($join) {
        $join->on('gh.clave_materia', '=', 'm.clave_materia')
            ->on('m.clave_plan_estudios', '=', 'gh.clave_plan_estudios');
    })
    ->join('grupos as g', function ($join) {
        $join->on('g.clave_materia', '=', 'gh.clave_materia')
            ->on('g.clave_plan_estudios', '=', 'gh.clave_plan_estudios')
            ->on('gh.letra_grupo', '=', 'g.letra_grupo');
    })
    ->join('profesores as p', 'p.rfc', '=', 'g.docente')
    ->where('dia_semana', 6)
    ->whereTime('hora_inicio', '<=', '12:01')
    ->whereTime('hora_fin', '>=', '12:01')
    ->where('a.edificio', 'P')
    ->get();

    
        // Resto del código para manejar asistencias y vista...
    
        return view('recorrido.pruebascesar', ['registros' => $registros, 'horaActual' => $horaActual]);
    }

    public function updateAsistencia(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'Asistencia' => 'required|array', // Asegúrate de que Asistencia sea un arreglo
        ]);

        // Obtiene las asistencias enviadas en el formulario
        $asistencias = $request->input('Asistencia');

        // Recorre las asistencias y actualiza la base de datos
        foreach ($asistencias as $id => $asistencia) {
            // Validar que $asistencia sea un valor válido (por ejemplo, 'Asistio' o 'No asistio')
            if (in_array($asistencia, ['Asistio', 'No asistio'])) {
                DB::table('datos')
                    ->where('ID', $id)
                    ->update(['Estado' => $asistencia]);
            }
        }

        // Redirige de nuevo a la página con un mensaje de éxito
        return redirect('/recorrido/pruebascesar')->with('success', 'Asistencias actualizadas con éxito.');
    }

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
