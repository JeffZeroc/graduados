@extends('layouts.menuSecretaria')
@section('title', 'Registro Datos') 
@section('menuSecretaria')
        <div class="main_content">
            <div class="table-filtrar">
                <form  action="{{ route('registrodatosUsuario_save') }}" class="contenedor-form" method="POST">
                    @csrf
                    @if (count($errors)>0)
                    <div class="alert alert-danger">@foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </div>
                    @endif
        
                    @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                    @endif
                    <div class="container">
                    <div class='container-estudiante'> 
                        <p>ESTUDIANTE</p>
 
                            <!-- ESTOS DATOS SE GUARDAN EN LA BD TABAL Estudiante -->
                            <input type="text" name="Cedula_Estudiante" id="cedula" value="{{old('Cedula_Estudiante')}}" placeholder="Ingresa la cedula" />
                            <input type="text" value="{{old('Nombre_Estudiante')}}" name="Nombre_Estudiante" id="nombres" placeholder="Los nombres" />
                            <input type="text"  value="{{old('Apellido_Estudiante')}}" name="Apellido_Estudiante" id="apellidos" placeholder="Los apellidos" />
                            <input type="text" value="{{old('Telefono_Estudiante')}}" name="Telefono_Estudiante" id="telefono" placeholder="El número de telefono" />
                            <input type="text" value="{{old('Nombre_CursoE')}}" name="Nombre_CursoE" id="nombreCurso" placeholder="Paralelo" />
                            <input type="email" value="{{old('Correo_InstitucionalE')}}" name="Correo_InstitucionalE" id="emailIntitucional" placeholder="Email Institucional" />
                            <input type="email" value="{{old('Correo_PersonalE')}}" name="Correo_PersonalE" id="emailPersonal" placeholder="Email Personal" />
                       
                    </div>

                    
                    <!-- <div class="container">  -->
                        <div class="row">
                          <div class="col-sm">
                          <div class='container-carrera'>
                              <p>Carrera</p> 
                                    <select name="carrera_id" id="carrera">
                                        @foreach ($carreras as $carrera)
                                        <option value="{{$carrera->id}}">{{$carrera->Nombre_Carrera}}</option>
                                        @endforeach
                                    </select>{{-- pendienteeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee --}}
                           
                            </div>
                          </div>
                          <div class="col-sm">
                              <div class='container-estado'>
                                    <p>Estado</p>
                                    <select name="Estado_Estudiante" id="estado">
                                        <option value="Graduado">Graduado</option>
                                        <option value="Egresado">Egresado</option>
                                        <option value="Proceso">En Proceso</option>
                                    </select>
                                </div>
                          </div>
                        </div>
                    <!--  </div>  -->

                    <div class="row">
                        <div class="col-sm">
                            <div class='container-requisitos'>
                                <p>Requisitos</p>
                                <!-- ESTOS DATOS SE GUARDAN EN LA BD TABLA Requisitos -->
                                @foreach ($requisitos as $requisito)
                                <br>
                                <label for="ingles">Aprobación de {{$requisito->nombreRequisito}}: </label>
                                <br>
                                <select name="requisito_id[]" id="ingles" >
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                    {{-- <option value="0">No</option> --}}
                                </select>
                                @endforeach
                            </div>
                        </div>
                        <div class='col-sm'>
                            <div class='container-periodo'>
                                <p>Periodo</p>    
                                <select name="periodo_id" id="nombrePeriodo">
                                    @foreach ($periodos as $periodo)
                                    <option value="{{$periodo->id}}">{{$periodo->Nombre_Periodo}}</option>
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
                    <button type="submit" class="btn-form btn-guardar">Guardar</button>
                    </div>
                  
                </form>
            </div>
        </div>
@endsection