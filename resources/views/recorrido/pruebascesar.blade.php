@extends('layouts.app') {{-- Asegúrate de que estás extendiendo el diseño correcto si tienes uno --}}
@section('content')

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0MEY0YXK6T"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-0MEY0YXK6T');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="wKhjeWmLRYCaifIV13OYiXMbnt97JOjY1igAYKgE">

    <title>CETECH - Sistema de Información Escolar</title>
    <link rel="stylesheet" href="https://cetech.sjuanrio.tecnm.mx/css/app.css">
    <link rel="stylesheet" href="https://cetech.sjuanrio.tecnm.mx/css/autocompleter.css">
    <link rel="stylesheet" href="https://cetech.sjuanrio.tecnm.mx/jqueryui-editable/css/jqueryui-editable.css">
    <link rel="stylesheet" href="https://cetech.sjuanrio.tecnm.mx/css/checkbox_off.css">
    <link rel="stylesheet" href="https://cetech.sjuanrio.tecnm.mx/css/dataTables.bootstrap.min.css">

    <!-- Estilo institucional -->
    <link rel="stylesheet" href="https://cetech.sjuanrio.tecnm.mx/css/css_220034.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- chosen -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css">
</head>

<div class="card-header">
    <h1>Registro de Asistencia Docente</h1>
    
    <p class="mensaje">Hoy es: {{ $horaActual->format('l, j F Y') }}, Hora: {{ $horaActual->format('H:i A') }}</p>
</div>



<div class="card-body">
    <a href="https://cetech.sjuanrio.tecnm.mx/home" class="btn btn-danger">
        <i class="fas fa-arrow-left"></i> Regresar
    </a>

    <a href="https://cetech.sjuanrio.tecnm.mx/estudiantes/71536/carga_academica" class="btn btn-primary" target="_black">Imprimir Tablas</a>

    <hr>

    <!-- Combobox para filtrado -->
    <label for="edificio" style="display: inline-block; margin-right: 10px;">Selecciona un edificio:</label>
    <select id="edificio" onchange="actualizarSalon()" style="display: inline-block;">
        <option value="vacio"></option>
        <option value="EDIFICIOP">EDIFICIO P</option>
        <option value="EDIFICIOQ">EDIFICIO Q</option>
        <option value="EDIFICIOM">EDIFICIO M</option>
    </select>

    <label for="salon" style="display: inline-block; margin-left: 20px;">Selecciona un Salon:</label>
    <select id="salon" style="display: inline-block;">
        <option value="1">1</option>
    </select>

    <div class="card-header">
        <!-- Declara el método POST y la URL de la vista -->
        <form method="POST" action="{{ url('/recorrido/pruebascesar') }}">
            <!-- Se establece el parámetro de Laravel para proteger contra CSRF -->
            @csrf
    <table class="table table-sm table-bordered table-hover">
        <!-- Encabezados de la tabla -->
        <thead>
            <tr>
                <th>clave_materia</th>
                <th>nombre_materia</th>
                <th>Hora de Inicio</th>
                <th>Hora de Fin</th>
                <th>Aula</th>
                <th>Edificio</th>
                <th>RFC Docente</th>
                <th>Nombre Docente</th>
                <th>Asistencia</th>
                <th>Observación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registros as $registro)
                <tr>
                    <td>{{ $registro->clave_materia }}</td>
                    <td>{{ $registro->nombre_materia }}</td>
                    <td>{{ $registro->hora_inicio }}</td>
                    <td>{{ $registro->hora_fin }}</td>
                    <td>{{ $registro->aula }}</td>
                    <td>{{ $registro->edificio }}</td>
                    <td>{{ $registro->rfc }}</td>
                    <td>{{ $registro->{'Nombre Docente'} }}</td>
                    <td>
                        <select class="form-control" name="asistencias[{{ $registro->clave_materia }}][{{ $registro->rfc }}]">
                            <option value="Asistio" {{ isset($asistencias[$registro->clave_materia][$registro->rfc]) && $asistencias[$registro->clave_materia][$registro->rfc] == 'Asistio' ? 'selected' : '' }}>Asistio</option>
                            <option value="No asistio" {{ isset($asistencias[$registro->clave_materia][$registro->rfc]) && $asistencias[$registro->clave_materia][$registro->rfc] == 'No asistio' ? 'selected' : '' }}>No asistio</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="observaciones[{{ $registro->clave_materia }}][{{ $registro->rfc }}]" maxlength="10" value="{{ isset($observaciones[$registro->clave_materia][$registro->rfc]) ? $observaciones[$registro->clave_materia][$registro->rfc] : '' }}">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Contenedor para el botón -->
    <div>
        <input class="btn btn-success" type="submit" value="Guardar Asistencia">
    </div>
</form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // JavaScript para mostrar la fecha y la hora actual
    function actualizarFechaYHora() {
        const fechaHoy = new Date();
        const opcionesFecha = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const fechaFormateada = fechaHoy.toLocaleDateString('es-ES', opcionesFecha);

        const opcionesHora = { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: false };
        const horaFormateada = fechaHoy.toLocaleTimeString('es-ES', opcionesHora);

        // Insertar la fecha y la hora actual en el elemento HTML
        const fechaHoraActualElemento = document.getElementById('fechaHoraActual');
        fechaHoraActualElemento.textContent = `${fechaFormateada} ${horaFormateada}`;
    }

    // Llamar a la función actualizarFechaYHora() para mostrar la fecha y hora actual inicialmente
    actualizarFechaYHora();

    // Actualizar la fecha y hora cada segundo
    setInterval(actualizarFechaYHora, 1000);
</script>
@endpush
