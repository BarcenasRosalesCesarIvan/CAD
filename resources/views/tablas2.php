<?php
                            function generarCasillaDeVerificacion($nombreCampo, $etiqueta) {
                                echo '<tr>';
                                echo '<td>' . $etiqueta . '</td>';
                                echo '<td><input type="checkbox" name="' . $nombreCampo . '" value="si">' . 'Sí</td>';
                                echo '<td><input type="checkbox" name="' . $nombreCampo . '_no" value="no">' . 'No</td>';
                                echo '</tr>';
                            }

// Paso 1: Conexión a la base de datos (cambiar según tu base de datos)
$conexion = mysqli_connect("localhost", "root", "", "p_cetech");

// Paso 2: Consulta de datos
$query = "SELECT Salon, Materia, Profesor, Horario FROM datos";
$resultado = mysqli_query($conexion, $query);

                            ?>


<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0MEY0YXK6T"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
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

    <!--  estilo institucion -->
    
        <link rel="stylesheet" href="https://cetech.sjuanrio.tecnm.mx/css/css_220034.css">

    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- chosen -->
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css">

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition sidebar-mini sidebar-collapse">
    <div id="app" class="wrapper">
        <!-- Navbar -->
        <nav id="main-header" class="main-header navbar navbar-expand navbar-white navbar-light border-bottom shadow">
            <!-- Left navbar links -->
                            <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>

                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="https://cetech.sjuanrio.tecnm.mx/home" class="nav-link">
                            <i class="fas fa-home"></i>
                            Inicio
                        </a>
                    </li>

                    
                </ul>
                        <!-- SEARCH FORM -->
            <!--form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form-->

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            CESAR IVAN BARCENAS ROSALES <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <!--a class="dropdown-item" href="https://cetech.sjuanrio.tecnm.mx/logout">
                                                                                                                                                                                              <i class="fas fa-user"></i>
                                                                                                                                                                                              Perfil
                                                                                                                                                                                            </a-->
                            <a class="dropdown-item" href="https://cetech.sjuanrio.tecnm.mx/changePassword">
                                <i class="fas fa-key"></i>
                                Cambiar Contraseña
                            </a>
                            <a class="dropdown-item" href="https://cetech.sjuanrio.tecnm.mx/logout"
                                onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                <i class="fas fa-power-off"></i>
                                Salir
                            </a>
                            <form id="logout-form" action="https://cetech.sjuanrio.tecnm.mx/logout" method="POST" style="display: none;">
                                <input type="hidden" name="_token" value="wKhjeWmLRYCaifIV13OYiXMbnt97JOjY1igAYKgE">                            </form>
                        </div>
                    </li>
                            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
                    <aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand">
                <!-- Brand Logo -->
                <a href="https://cetech.sjuanrio.tecnm.mx/home" class="brand-link text-sm">
                    <img src="/img/logo.png" width="32px" height="32px" alt="Logo empresa"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">SIEWEB</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="/img/profile.png" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block"> CESAR IVAN BARCENAS ROSALES</a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-legacy nav-compact nav-child-indent"
                            data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="https://cetech.sjuanrio.tecnm.mx/logout" class="nav-link"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form-nav').submit();">
                                    <i class="nav-icon fas fa-power-off"></i>
                                    <p> Salir</p>
                                </a>

                                <form id="logout-form-nav" action="https://cetech.sjuanrio.tecnm.mx/logout" method="POST"
                                    style="display: none;">
                                    <input type="hidden" name="_token" value="wKhjeWmLRYCaifIV13OYiXMbnt97JOjY1igAYKgE">                                </form>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
                <!-- Content Wrapper. Contains page content -->
        <div id="content-wrapper" class="content-wrapper">

            <!-- Content Header (Page header) -->
            <div class="content-header">
                                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark"></h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="https://cetech.sjuanrio.tecnm.mx/home">Inicio</a>
                                    </li>
                                    <li class="breadcrumb-item active"></li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card uper">

   
            <style>
                .card-header {
                    text-align: center;
              }
             .mensaje {
             font-size: 1.5em;
              }
              </style>



            <div class="card-header">
             <h1>Registro de Asistencia Docente</h1>
            
             <p class="mensaje">El día de hoy es: <span id="fechaHoraActual" class="mensaje"></span></p>
            </div>


            
                <div class="card-body">
                <a href="https://cetech.sjuanrio.tecnm.mx/home" class="btn btn-danger">
                        <i class="fas fa-arrow-left"></i> Regresar
                    </a>
                    
                    
                    <a href="https://cetech.sjuanrio.tecnm.mx/estudiantes/71536/carga_academica" class="btn btn-primary" target="_black">Imprimir Tablas</a>

                    <hr>

                      <!-- JCOMBOBOX PARA FILTRADO-->

                    <label for="edificio" style="display: inline-block; margin-right: 10px;">Selecciona un edificio:</label>
                    <select id="edificio"  onchange="actualizarSalon()" style="display: inline-block;">
                        <option value="vacio"></option>
                        <option value="EDIFICIOP">EDIFICIO P</option>
                        <option value="EDIFICIOQ">EDIFICIO Q</option>
                        <option value="EDIFICIOM">EDIFICIO M</option>
                    </select>

                    <label for="salon" style="display: inline-block; margin-left: 20px;">Selecciona un Salon:</label>
                    <select id="salon" style="display: inline-block;">
                        <option value="1">1</option>
                    </select>

           
                    @extends('layout.app') <!-- Supongamos que tienes un layout base llamado 'app.blade.php' -->

@section('content')
    <form method="POST" action="{{ route('guardar_asistencia') }}"> <!-- Define la ruta para guardar la asistencia -->
        @csrf <!-- Agrega el token CSRF para protección -->

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
                @foreach($resultado as $fila)
                    @php
                        $id = $fila['ID'];
                        $salon = $fila['Salon'];
                        $materia = $fila['Materia'];
                        $profesor = $fila['Profesor'];
                        $horario = $fila['Horario'];
                        // Obtener la asistencia actual para este registro
                        $asistenciaActual = isset($asistencias[$id]) ? $asistencias[$id] : "";
                    @endphp
                    <tr>
                        <td>{{ $salon }}</td>
                        <td>{{ $materia }}</td>
                        <td>{{ $profesor }}</td>
                        <td><small>{{ $horario }}</small></td>
                        <td>
                            <select class="form-control" name="Asistencia[{{ $id }}]">
                                <option value="Asistio" {{ $asistenciaActual == 'Asistio' ? 'selected' : '' }}>Asistio</option>
                                <option value="No asistio" {{ $asistenciaActual == 'No asistio' ? 'selected' : '' }}>No asistio</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Contenedor para los botones -->
        <div>
            <button type="submit" class="btn btn-success">Guardar Asistencia</button>
            <!-- Agrega la ruta para generar el reporte Excel -->
            <a href="{{ route('generar_reporte_excel') }}" class="btn btn-success">Generar Reporte Excel</a>
        </div>
    </form>
@endsection




                </div>
            </div>
        </div>
    </div>
</div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong> Copyright&copy; 2023 .</strong>
            All
            rights reserved.

            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
            <div class="d-none d-sm-inline-block">
                <a href="https://cetech.sjuanrio.tecnm.mx/informacion/aviso_privacidad">
                    Aviso de privacidad
                </a>
            </div>

        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script src="https://cetech.sjuanrio.tecnm.mx/js/app.js"></script>
    <script src="https://cetech.sjuanrio.tecnm.mx/js/bootstrap3-typeahead.js"></script>
    <script src="https://cetech.sjuanrio.tecnm.mx/jqueryui-editable/js/jqueryui-editable.min.js"></script>
    <script src="https://cetech.sjuanrio.tecnm.mx/js/chosen.jquery.js"></script>
    <script src="https://cetech.sjuanrio.tecnm.mx/js/chosen.proto.js"></script>
    <script src="https://cetech.sjuanrio.tecnm.mx/js/checkbox_off.js"></script>
    <script src="https://cetech.sjuanrio.tecnm.mx/js/jquery.mask.min.js"></script>

    <script src="https://cetech.sjuanrio.tecnm.mx/js/jquery.dataTables.min.js"></script>
    <script src="https://cetech.sjuanrio.tecnm.mx/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".chosen-select").chosen();
            //new DataTable('#data-table');
            new DataTable('#data-table', {
                info: false,
                ordering: false,
                paging: false,
                language: {
                    search: 'Buscar'
                }
            });
        });
    </script>


<script>
    // Función para generar las casillas de verificación en un contenedor específico
    function generarCasillas(contenedorId) {
        var casillasDiv = document.getElementById(contenedorId);
        casillasDiv.innerHTML = ''; // Borra el contenido anterior, si lo hubiera

        // Crea casilla de asistencia (checkbox)
        var casillaAsistencia = document.createElement("input");
        casillaAsistencia.type = "checkbox";
        casillaAsistencia.name = contenedorId + "_asistencia"; // Nombre basado en el contenedor
        casillaAsistencia.value = "1"; // Valor 1 para asistencia, no marcado por defecto
        var labelAsistencia = document.createElement("label");
        labelAsistencia.htmlFor = casillaAsistencia.name;
        labelAsistencia.textContent = "   Asistio";

        // Agrega la casilla de asistencia al contenedor
        casillasDiv.appendChild(casillaAsistencia);
        casillasDiv.appendChild(labelAsistencia);
    }

    // Llama a la función para generar las casillas al cargar la página
    document.addEventListener("DOMContentLoaded", function() {
        generarCasillas('casillas1');
        generarCasillas('casillas2');
        generarCasillas('casillas3');
        generarCasillas('casillas4');
        generarCasillas('casillas5');
        generarCasillas('casillas6');
    });
</script>



    <script>
        // JavaScript para mostrar la fecha y la hora actual
        const fechaHoy = new Date();
        const opcionesFecha = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const fechaFormateada = fechaHoy.toLocaleDateString('es-ES', opcionesFecha);

        const opcionesHora = { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: false };
        const horaFormateada = fechaHoy.toLocaleTimeString('es-ES', opcionesHora);

        // Insertar la fecha y la hora actual en el elemento HTML
        const fechaHoraActualElemento = document.getElementById('fechaHoraActual');
        fechaHoraActualElemento.textContent = `${fechaFormateada} ${horaFormateada}`;
    </script>


<script>
    // Función para actualizar la hora actual cada segundo
    function actualizarHora() {
        const fechaHoy = new Date();
        const opcionesHora = { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: false };
        const horaFormateada = fechaHoy.toLocaleTimeString('es-ES', opcionesHora);
        const fechaHoraActualElemento = document.getElementById('fechaHoraActual');
        fechaHoraActualElemento.textContent = `${fechaFormateada}`;
    }

    // Llamar a la función actualizarHora() para mostrar la hora actual inicialmente
    actualizarHora();

    // Actualizar la hora cada segundo
    setInterval(actualizarHora, 1000);
</script>

<script>
        // Obtiene referencias a los combobox
        var edificioCombobox = document.getElementById("edificio");
        var salonCombobox = document.getElementById("salon");

        // Define las opciones de municipios para cada estado
        var opcionesSalon = {
            EDIFICIOP: ["LP","LSO","LTI"],
            EDIFICIOQ: ["Q1","Q2","Q3","Q4"],
            "EDIFICIOM": ["M1","M2","M3","M4"]
        };

        // Función para actualizar las opciones del combobox de municipios
        function actualizarSalon() {
            var selectedEdificio = edificioCombobox.value;
            var salon = opcionesSalon[selectedEdificio];

            // Limpia el combobox de municipios
            salonCombobox.innerHTML = '';

            // Agrega las nuevas opciones
            for (var i = 0; i < salon.length; i++) {
                var option = document.createElement("option");
                option.value = salon[i];
                option.text = salon[i];
                salonCombobox.appendChild(option);
            }
        }

        // Llama a la función para inicializar las opciones de municipios
        actualizarSalon();
    </script>





    </body>

</html>
