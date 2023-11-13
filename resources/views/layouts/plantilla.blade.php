<!doctype html>
<!--<html lang="es">-->

<head>
    <!-- Google tag (gtag.js) -->
    <!--<script async src="https://www.googletagmanager.com/gtag/js?id=G-0MEY0YXK6T"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-0MEY0YXK6T');
    </script>-->

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    @csrf

    <title>CAD Control Asistencia Docente</title>
    <link rel="stylesheet" href="https://cetech.sjuanrio.tecnm.mx/css/app.css">
    <link rel="stylesheet" href="https://cetech.sjuanrio.tecnm.mx/css/autocompleter.css">
    <link rel="stylesheet" href="https://cetech.sjuanrio.tecnm.mx/jqueryui-editable/css/jqueryui-editable.css">
    <link rel="stylesheet" href="https://cetech.sjuanrio.tecnm.mx/css/checkbox_off.css">
    <link rel="stylesheet" href="https://cetech.sjuanrio.tecnm.mx/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <!--  estilo institucion -->

    <!-- <link rel="stylesheet" href="https://cetech.sjuanrio.tecnm.mx/css/css_220034.css"> -->


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
                    <a href="https://cad.josejaime.me/home" class="nav-link">
                        <i class="fas fa-home"></i>
                        Inicio
                    </a>
                </li>


            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ $nombre }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <!--<a class="dropdown-item" href="https://cetech.sjuanrio.tecnm.mx/changePassword">
                                <i class="fas fa-key"></i>
                                Cambiar Contraseña
                            </a> -->
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                            <i class="fas fa-power-off"></i>
                            Salir
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand">
            <!-- Brand Logo -->
            <a href="https://cad.josejaime.me/home" class="brand-link text-sm">
                <img src="/img/logo.png" width="32px" height="32px" alt="Logo empresa"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Control Asistencia Docente</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/img/profile.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"> {{ $nombre }} </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-legacy nav-compact nav-child-indent"
                        data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link"
                                onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p> Salir</p>
                            </a>

                            <form id="logout-form-nav" action="{{ route('logout') }}" method="POST"
                                style="display: none; ">
                                @csrf
                                <!-- <input type="hidden" name="_token" value="JKXTlrBkogmtIqshcIXfZFfaS9ocmFvNiw88MYhw"> -->
                            </form>
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
                                <li class="breadcrumb-item"><a href="http://cad.josejaime.me/home">Inicio</a>
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

                                    @yield('content')


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
                <!-- <a href="https://cetech.sjuanrio.tecnm.mx/informacion/aviso_privacidad"> -->
                <strong> Gestión de Proyectos de Software - Qualitec </strong>
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

</body>

</html>
