@extends('layouts.menuSecretaria')
@section('title', 'Consultar')
@section('menuSecretaria')
    <!--Ejemplo tabla con DataTables-->
    <style>
        ul li .modal_lista {
            background-color: #268666;
            color: #fff;
            text-align: center;
            width: 170px;
            display: inline-block;
            border-radius: 5px;
            margin-bottom: 5px;
            padding: 5px 0;
        }

        .bien {
            background-color: #28a745;
            text-align: center;
            border-radius: 3px;
            color: #fff;
            border-style: none;
            margin-bottom: 10px;
            padding: 1px 5px;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .mal {
            background-color: #dc3545;
            text-align: center;
            border-radius: 3px;
            color: #fff;
            border-style: none;
            margin-bottom: 10px;
            padding: 1px 5px;
            font-size: 14px;
            margin-bottom: 5px;
        }

    </style>
    <div class=" container2">
        <div class="row">

            <div class="col-lg-12">
                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importar"> --}}
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">

                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <a type="button" class="btn btn-primary" href="{{ route('alumnos.importForm') }}">Importar Excel </a>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered corredor" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Cédula</th>
                                <th>Nombre</th>
                                {{-- <th>Apellidos</th>                           
                                            <th>Teléfono</th>
                                            <th>Nom Curso</th>
                                            <th>Correo Institucional</th>
                                            <th>Correo personal</th>
                                            <th>Estado</th> --}}
                                <th>Periodo</th>
                                <th>Carrera</th>
                                <th>Nivel</th>
                                <th>Requisitos</th>
                                <th>Estado</th>
                                <th class="accion"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($estudiantes as $re)
                                <tr>
                                    <td>{{ $re->cedula }}</td>
                                    <td>{{ $re->apellido_paterno }} {{ $re->apellido_materno }} {{ $re->nombre }}
                                    </td>
                                    <td>{{ $re->periodo->Nombre_Periodo }}</td>
                                    <td>{{ $re->Carrera->Nombre_Carrera }}</td>
                                    <td>{{ $re->curso }}</td>

                                    <td>
                                        @foreach ($estudianteRequisitos as $r)
                                            @if ($r->estudiante_id == $re->id)
                                                @if ($r->valorRequisito == 'SI')
                                                    <p class="bien">{{ $r->Requisitos1->nombreRequisito }}:
                                                        Aprobado
                                                    @else
                                                    <p class="mal">{{ $r->Requisitos1->nombreRequisito }}:
                                                        Requerido
                                                @endif
                                                </p>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $re->estado }}</td>

                                    <td>
                                        <button type="button" class="btn btn-success"><a
                                                href="{{ route('registrodatosUsuario-show', ['id' => $re->id]) }}"
                                                id="color-editar"><svg style="color: #fff"
                                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></a></button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#modal{{ $re->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                <path
                                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                            </svg>
                                        </button>

                                    </td>
                                </tr>
                                {{-- modal --}}
                                <div class="modal fade" id="modal{{ $re->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Datos de estudiante</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <ul>
                                                    <li style="margin-right: 5px;"><span class="modal_lista">Cedula:
                                                        </span> {{ $re->cedula }}</li>
                                                    <li style="margin-right: 5px;"><span class="modal_lista">Nombres:
                                                        </span> {{ $re->apellido_paterno }}
                                                        {{ $re->apellido_materno }}
                                                        {{ $re->nombre }}</li>
                                                    <li style="margin-right: 5px;"><span class="modal_lista">Telefono:
                                                        </span> {{ $re->celular }}</li>
                                                    <li style="margin-right: 5px;"><span class="modal_lista">Fecha
                                                            Nacimiento: </span> {{ $re->fecha_nacimiento }}</li>
                                                    <li style="margin-right: 5px;"><span class="modal_lista">Edad:
                                                        </span> {{ $re->edad }}</li>
                                                    <li style="margin-right: 5px;"><span class="modal_lista">Género:
                                                        </span> {{ $re->genero }}</li>
                                                    <li style="margin-right: 5px;"><span
                                                            class="modal_lista">Convencional: </span>
                                                        {{ $re->convencional }}</li>
                                                    <li style="margin-right: 5px;"><span class="modal_lista">Etnia:
                                                        </span> {{ $re->etnia }}</li>
                                                    <li style="margin-right: 5px;"><span class="modal_lista">Nacionalidad
                                                            Etnia: </span> {{ $re->nacionalidad_etnica }}</li>
                                                    <li style="margin-right: 5px;"><span
                                                            class="modal_lista">Discapacidad: </span>
                                                        {{ $re->discapacidad }}</li>
                                                    <li style="margin-right: 5px;"><span class="modal_lista">Estado
                                                            Civil: </span> {{ $re->estado_civil }}</li>
                                                    <li style="margin-right: 5px;"><span class="modal_lista">País:
                                                        </span> {{ $re->pais }}</li>
                                                    <li style="margin-right: 5px;"><span class="modal_lista">Carrera:
                                                        </span> {{ $re->Carrera->Nombre_Carrera }}</li>
                                                    <li style="margin-right: 5px;"><span class="modal_lista">Curso:
                                                        </span> {{ $re->curso }}</li>
                                                    <li style="margin-right: 5px;"><span class="modal_lista">Facultad:
                                                        </span>
                                                        @foreach ($facultades as $facultade)
                                                            @if ($facultade->id == $re->Carrera->facultad_id)
                                                                {{ $facultade->Nombre_Facultad }}
                                                            @endif
                                                        @endforeach
                                                    </li>
                                                    <li style="margin-right: 5px;"><span class="modal_lista">Correo
                                                            Institucional: </span> {{ $re->correo_institucional }}</li>
                                                    <li style="margin-right: 5px;"><span class="modal_lista">Correo
                                                            Personal: </span> {{ $re->Correo_personal }}</li>
                                                    <li style="margin-right: 5px;"><span class="modal_lista">Estado:
                                                        </span> {{ $re->estado }}</li>
                                                    <li style="margin-right: 5px;"><span class="modal_lista">Periodo
                                                            Academico: </span> {{ $re->periodo->Nombre_Periodo }}</li>
                                                    @foreach ($estudianteRequisitos as $r)
                                                        @if ($r->estudiante_id == $re->id)
                                                            <li style="margin-right: 5px;"><span
                                                                    class="modal_lista">{{ $r->Requisitos1->nombreRequisito }}:
                                                                </span>

                                                                @if ($r->valorRequisito == 'SI')
                                                                    <span class="bien">Aprobado <br></span>
                                                                @else
                                                                    <span class="mal">Rechazado <br></span>
                                                                @endif
                                                        @endif
                                                    @endforeach
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- @foreach ($requisitos2 as $requisitos)
                        {{$requisitos->id}}
                        {{$requisitos->nombreRequisito}} <br>
                    @endforeach --}}

    </div>
    <!-- Modal -->
    <div class="modal fade" id="importar" tabindex="-1" aria-labelledby="importarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importarLabel">Importar Estudiantes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('alumnos.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="file" name="import_file" />

                        <button class="btn btn-primary" type="submit">Importar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
