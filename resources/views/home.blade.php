@extends('layouts.plantilla')

@section('content')
    <div class="card">
        <div class="card-header">Panel Principal</div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="text-center card-body">
                            <p class="card-text"> {{ $nombre }} </p>
                            <img src="/img/profile.png" width="80px" height="80px" class="img-circle elevation-2"
                                alt="User Image">
                        </div>
                    </div>
                </div>
                <!--if vaidarRoles-->
                <!--if vaidarRoles-->
                    @hasrole('jefe')
                        <div class="col-sm-4 ">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class=""><i class="fas fa-file"></i>
                                        Reportes prefectura
                                    </h5>
                                    <p class="card-text">Consulta la asistencia de los profesores a las clases.
                                    </p>
                                    <a href="{{ route('reportesDocente') }}"
                                        class="btn btn-primary">Acceder
                                        <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @else
                    <div class="col-sm-4 "> </div>

                    @endhasrole
                <!--if sub 14-->
                <!--if vaidarRoles-->
                <!--if vaidarRoles-->
                <!--if vaidarRoles-->
                @role('prefecto')
                    <div class="col-sm-4 ">
                        <div class="card">
                            <div class="card-body">
                                <h5 class=""><i class="fas fa-check"></i>
                                    Asistencia Docente
                                </h5>
                                <p class="card-text">Ingresa para iniciar el recorrido y confirmar asistencia.
                                </p>
                                <a href="{{ route('asistenciaDocente') }}"
                                    class="btn btn-primary">Acceder
                                    <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endrole
                @role('jefe')
                    <div class="col-sm-4 ">
                        <div class="card">
                            <div class="card-body">
                                <h5 class=""><i class="fas fa-user-check"></i>
                                    Administrar Prefectos
                                </h5>
                                <p class="card-text">Agrega, elimina o modifica información de los prefectos.
                                </p>
                                <a href="{{ route('crudPrefecto') }}"
                                    class="btn btn-primary">Acceder
                                    <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endrole
                <!--if sub 14-->
                <!--if vaidarRoles-->
                <!--if vaidarRoles-->
                <div class="col-sm-4 ">
                </div>

            </div>
        </div>
    </div>
@endsection
