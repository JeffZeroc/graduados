@extends('layouts.menuSecretaria')

@section('title', 'Registro Datos') 

@section('menuSecretaria')
    
       
        <div class="main_content">
            
            @if (count($errors)>0)
            <div class="alert alert-danger">@foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </div>
            @endif

            @if (session('success'))
            <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            <div class="table-filtrar">
                <!--****************************************-->
                <form action="{{ route('registrodatosUsuario_save') }}" class="contenedor-form" method="POST">
                    @csrf
                    <fieldset>
                        <legend>Estudiante</legend>
                        <!-- ESTOS DATOS SE GUARDAN EN LA BD TABAL Estudiante -->
                        <input type="number" name="Cedula_Estudiante" id="cedula" placeholder="ingresa tu cedula" />
                        <input type="text" name="Nombre_Estudiante" id="nombres" placeholder="tus nombres" />
                        <input type="text"  name="Apellido_Estudiante" id="apellidos" placeholder="tus apellidos" />
                        <input type="number" name="Telefono_Estudiante" id="telefono" placeholder="tu numero de telefono" />
                        <input type="text" name="Nombre_CursoE" id="nombreCurso" placeholder="Nombre del curso" />
                        <input type="email" name="Correo_InstitucionalE" id="emailIntitucional" placeholder="Email Institucuional" />
                        <input type="email" name="Correo_PersonalE" id="emailPersonal" placeholder="tu email Personal" />
                        
                    </fieldset>

                    <div class="container">
                        <div class="row">
                          <div class="col-sm">
                            <fieldset>
                                <legend>Carrera</legend>    
                                    <select name="carrera_id" id="carrera">
                                        @foreach ($carreras as $carrera)
                                        <option value="{{$carrera->id}}">{{$carrera->Nombre_Carrera}}</option>
                                        @endforeach
                                    </select>{{-- pendienteeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee --}}
                            </fieldset>
                          </div>
                          <div class="col-sm">
                            <fieldset>
                                <legend>Estado:</legend>
                                <select name="Estado_Estudiante" id="estado">
                                    <option value="Graduado">Graduado</option>
                                    <option value="Egresado">Egresado</option>
                                    <option value="Proceso">Proceso</option>
                                </select>
                            </fieldset>  
                          </div>
                        </div>
                    </div>

                    <fieldset>
                        <legend>Requisitos</legend>
                        <!-- ESTOS DATOS SE GUARDAN EN LA BD TABLA Requisitos -->
                        @foreach ($requisitos as $requisito)
                        <label for="ingles">Aprobación de {{$requisito->nombreRequisito}}:</label>
                        <select name="valorRequisito" id="ingles">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                        @endforeach

                    </fieldset>


                    
                    <fieldset>
                        <legend>Periodo</legend>
                        <select name="Nombre_Periodo" id="nombrePeriodo">
                            @foreach ($periodos as $periodo)
                            <option value="{{$periodo->id}}">{{$periodo->Nombre_Periodo}}</option>
                            @endforeach
                        </select>
                        <lable for="inicioPeriodo" >Inicio</lable>
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
                        </select>
                    </fieldset>


                    <div class="contenedor-botones__accion">
                        <button type="button" class="btn btn-guardar">Guardar</button>
                    </div>

                </form>
                <!--*****************************************-->
            </div>
        </div>
    
@endsection