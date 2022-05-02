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
                    <fieldset>
                        <legend>Estudiante</legend>
                        <!-- ESTOS DATOS SE GUARDAN EN LA BD TABAL Estudiante -->
                        <input type="text" name="Cedula_Estudiante" id="cedula" value="{{$estudiantes->Cedula_Estudiante}}" placeholder="Ingresa la cedula" />
                        <input type="text" value="{{$estudiantes->Nombre_Estudiante}}" name="Nombre_Estudiante" id="nombres" placeholder="Los nombres" />
                        <input type="text"  value="{{$estudiantes->Apellido_Estudiante}}" name="Apellido_Estudiante" id="apellidos" placeholder="Los apellidos" />
                        <input type="text" value="{{$estudiantes->Telefono_Estudiante}}" name="Telefono_Estudiante" id="telefono" placeholder="El número de telefono" />
                        <input type="text" value="{{$estudiantes->Nombre_CursoE}}" name="Nombre_CursoE" id="nombreCurso" placeholder="Nombre del curso" />
                        <input type="email" value="{{$estudiantes->Correo_InstitucionalE}}" name="Correo_InstitucionalE" id="emailIntitucional" placeholder="Email Institucional" />
                        <input type="email" value="{{$estudiantes->Correo_PersonalE}}" name="Correo_PersonalE" id="emailPersonal" placeholder="Email Personal" />
                        
                    </fieldset>

                    <div class="container">
                        <div class="row">
                          <div class="col-sm">
                            <fieldset>
                                <legend>Carrera</legend>    
                                    <select name="carrera_id" id="carrera">
                                        @foreach ($carreras as $carrera)
                                        <option value="{{$carrera->id}}" @if ($estudiantes->carrera_id == $carrera->id)selected="selected" @endif >{{$carrera->Nombre_Carrera}}</option>
                                        @endforeach
                                    </select>{{-- pendienteeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee --}}
                            </fieldset>
                          </div>
                          <div class="col-sm">
                            <fieldset>
                                <legend>Estado:</legend>
                                <select name="Estado_Estudiante" id="estado">
                                    <option value="Graduado" @if ($estudiantes->Estado_Estudiante == "Graduado")selected="selected" @endif>Graduado</option>
                                    <option value="Egresado" @if ($estudiantes->Estado_Estudiante == "Egresado")selected="selected" @endif>Egresado</option>
                                    <option value="Proceso" @if ($estudiantes->Estado_Estudiante == "Proceso")selected="selected" @endif>Proceso</option>
                                </select>
                            </fieldset>  
                          </div>
                        </div>
                    </div>

                    <fieldset>
                        <legend>Requisitos</legend>
                        <!-- ESTOS DATOS SE GUARDAN EN LA BD TABLA Requisitos -->
                        @foreach ($estudiantes->estudianteRequisito as $Requisito)
                        <label for="ingles">Aprobación de {{$Requisito->Requisitos1 ->nombreRequisito}}:</label>
                        <select name="requisito_id[]" id="ingles">
                            
                            <option value="1" @if ($Requisito->valorRequisito == 1) selected="selected" @endif>Si</option>
                            <option value="0" @if ($Requisito->valorRequisito == 0) selected="selected" @endif>No</option>
                            
                            {{-- <option value="0">No</option> --}}
                        </select>
                        @endforeach
                        
                    </fieldset>


                    
                    <fieldset>
                        <legend>Periodo</legend>
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
                    </fieldset>
                    
                    <div class="contenedor-botones__accion">
                        <button type="submit" class="btn btn-guardar">Guardar</button>
                    </div>

                </form>
                <!--*****************************************-->
            </div>
        </div>
    
@endsection