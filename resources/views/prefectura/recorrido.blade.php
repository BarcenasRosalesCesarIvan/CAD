@extends('layouts.plantilla')

@section('content')

<div class="card-header">
        <!-- Declara el método POST y la URL de la vista -->
        <form method="POST" action="{{ url('/recorrido/pruebascesar') }}">
            <!-- Se establece el parámetro de Laravel para proteger contra CSRF -->
            @csrf
            
            <table class="table table-sm table-bordered table-hover">
                <!-- Encabezados de la tabla -->
                <thead>
                    <tr>
                        <th>Salon</th>
                        <th>Materia</th>
                        <th>Profesor</th>
                        <th>Horario</th>
                        <th>Asistencia</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registros as $registro)
                    <tr>
                        <td>{{ $registro->Salon }}</td>
                        <td>{{ $registro->Materia }}</td>
                        <td>{{ $registro->Profesor }}</td>
                        <td><small>{{ $registro->Horario }}</small></td>
                        <td>
                            <select class="form-control" name="Asistencia[{{ $registro->ID }}]">
                                <option value="Asistio" {{ isset($asistencias[$registro->ID]) && $asistencias[$registro->ID] == 'Asistio' ? 'selected' : '' }}>Asistio</option>
                                <option value="No asistio" {{ isset($asistencias[$registro->ID]) && $asistencias[$registro->ID] == 'No asistio' ? 'selected' : '' }}>No asistio</option>
                            </select>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Contenedor para el botón -->
            <div>
                <span class="btn btn-success">Generar Reporte Excel</span>
                <input class="btn btn-success" type="submit" value="Guardar Asistencia">
            </div>
        </form>
    </div>
</div>
@endsection



@endsection
