@extends('layouts.menuSecretaria')
@section('title', 'Registro Datos') 
@section('menuSecretaria')
        <div class="main_content">
            <div class="table-filtrar">
                <!--****************************************-->
                <form  action="{{ route('registrodatosUsuario_update', ['id' => $estudiantes->id]) }}" class="contenedor-form" method="POST">
                    @csrf
                    @method('PATCH')
                    @if (count($errors)>0)
                    <div class="alert alert-danger">@foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </div>
                    @endif
        
                    @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                    @endif

                    <div class='container-estudiante'>
                        <p>Estudiante</p>
                        <!-- ESTOS DATOS SE GUARDAN EN LA BD TABAL Estudiante -->
                        <input type="text" name="cedula" id="cedula" value="{{$estudiantes->cedula}}" placeholder="Ingresa la cedula" />
                        <input type="text" value="{{$estudiantes->nombre}}" name="nombre" id="nombres" placeholder="Los nombres" />
                        <input type="text"  value="{{$estudiantes->apellido_paterno}} {{$estudiantes->apellido_materno}}" name="apellido_paterno" id="apellidos" placeholder="Los apellidos" />
                        <input type="date" style="display: inline;
                        width: 45%;
                        margin: 10px;
                        padding: 8px;
                        border: none;
                        border-radius: 8px;" value="{{$estudiantes->fecha_nacimiento}}" name="fecha_nacimiento" />
                        <input type="number" style="display: inline;
                        width: 45%;
                        margin: 10px;
                        padding: 8px;
                        border: none;
                        border-radius: 8px;" value="{{$estudiantes->edad}}" name="edad"  placeholder="La edad" />
                        <input type="text"  value="{{$estudiantes->genero}}" name="genero"  placeholder="Genero" />
                        <input type="text"  value="{{$estudiantes->convencional}}" name="convencional"  placeholder="El convencional" />
                        <input type="text"  value="{{$estudiantes->etnia}}" name="etnia"  placeholder="Etnia" />
                        <input type="text"  value="{{$estudiantes->nacionalidad_etnica}}" name="nacionalidad_etnica"  placeholder="Nacionalidad Etnica" />
                        <input type="text"  value="{{$estudiantes->discapacidad}}" name="discapacidad"  placeholder="Discapacidad" />
                        <input type="text"  value="{{$estudiantes->estado_civil}}" name="estado_civil"  placeholder="Estado Civil" />
                        <input type="text"  value="{{$estudiantes->pais}}" name="pais"  placeholder="País" />
                        <input type="text" value="{{$estudiantes->celular}}" name="celular" id="telefono" placeholder="El número de telefono" />
                        <input type="text" value="{{$estudiantes->curso}}" name="curso" id="nombreCurso" placeholder="Nombre del curso" />
                        <input type="email" value="{{$estudiantes->correo_institucional}}" name="correo_institucional" id="emailIntitucional" placeholder="Email Institucional" />
                        <input type="email" value="{{$estudiantes->Correo_personal}}" name="Correo_personal" id="emailPersonal" placeholder="Email Personal" />
                        
                    </div>
                        <div class="row">
                          <div class="col-sm">
                            <div class='container-carrera'>
                                <p>Carrera</p>    
                                    <select name="carrera_id" id="carrera">
                                        @foreach ($carreras as $carrera)
                                        <option value="{{$carrera->id}}" @if ($estudiantes->carrera_id == $carrera->id)selected="selected" @endif >{{$carrera->Nombre_Carrera}}</option>
                                        @endforeach
                                    </select>{{-- pendienteeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee --}}
                            </div>
                          </div>
                          <div class="col-sm">
                            <div class='container-carrera'>
                                <p>Estado:</p>
                                <select name="estado" id="estado">
                                    <option value="Graduado" @if ($estudiantes->estado == "Graduado")selected="selected" @endif>Graduado</option>
                                    <option value="Egresado" @if ($estudiantes->estado == "Egresado")selected="selected" @endif>Egresado</option>
                                    <option value="Proceso" @if ($estudiantes->estado == "Proceso")selected="selected" @endif>Proceso</option>
                                </select>
                            </div>  
                          </div>
                        </div>

                        <div class='row'>
                            <div class="col-sm">
                                <div class='container-requisitos'>
                                    <p>Requisitos</p>
                                    <!-- ESTOS DATOS SE GUARDAN EN LA BD TABLA Requisitos -->
                                    @foreach ($estudiantes->estudianteRequisito as $Requisito)
                                    <label for="ingles">Aprobación de {{$Requisito->Requisitos1 ->nombreRequisito}}:</label>
                                    <select name="requisito_id[]" id="ingles">
                                        <option value="SI" @if ($Requisito->valorRequisito == 'SI') selected="selected" @endif>SI</option>
                                        <option value="NO" @if ($Requisito->valorRequisito == 'NO') selected="selected" @endif>NO</option>
                                        {{-- <option value="0">No</option> --}}
                                    </select>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class='container-periodo'>
                                    <p>Periodo</p>
                                    <select name="periodo_id" id="nombrePeriodo">
                                        @foreach ($periodos as $periodo)
                                        <option value="{{$periodo->id}}" @if ($estudiantes->periodo_id == $periodo->id)selected="selected" @endif>{{$periodo->Nombre_Periodo}}</option>
                                        @endforeach
                                    </select>
                                {{--  <lable for="inicioPeriodo" >Inicio</lable>
                                    <select name="Inicio_Periodo" id="inicioPeriodo">
                                        @foreach ($periodos as $periodo)
                                        <option value="{{$periodo->id}}">{{$periodo->Inicio_Periodo}}</option>
                                        @endforeach
                                    </select>
                                    <lable for="finPeriodo" >Finalizacion</lable>
                                    <select name="Fin_Periodo" id="finPeriodo">
                                        @foreach ($periodos as $periodo)
                                        <option value="{{$periodo->id}}">{{$periodo->Fin_Periodo}}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                            </div>
                        </div>
                        <a href="/ListaUsuariosEstudiantes" class="btn btn-secondary">
                            Volver
                        </a>
                        <button type="submit" class="btn-form btn-guardar">Guardar</button>
                </form>
            </div>
        </div>
    
@endsection