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
                <form action="#" class="contenedor-form" method="POST">
                    @csrf
                    <fieldset>
                        <legend>Estudiante</legend>
                        <!-- ESTOS DATOS SE GUARDAN EN LA BD TABAL Estudiante -->
                        <input type="number" name="Cedula_Estudiante" id="cedula" placeholder="ingresa tu cedula" />
                        <input type="text" name="Nombre_Estudiante" id="nombres" placeholder="tus nombres" />
                        <input type="text"  name="Apellido_Estudiante" id="apellidos" placeholder="tus apellidos" />
                        <input type="number" name="Telefono_Estudiante" id="telefono" placeholder="tu numero de telefono" />
                        <label for="carrera">Carrera:{{-- pendienteeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee --}}
                        <select name="carrera" id="carrera">
                            <option value="TecnologiaInformacion">tecnologias de la informacion</option>
                            <option value="contabilidadAuditoria">Contabilidad y Auditoria</option>
                            <option value="administracionEmpresas">Administracion de Empresas</option>
                            <option value="administracionPublica">Administracion Publica</option>
                        </select>{{-- pendienteeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee --}}
                        <input type="text" name="Nombre_CursoE" id="nombreCurso" placeholder="Nombre del curso" />
                        <input type="email" name="Correo_InstitucionalE" id="emailIntitucional" placeholder="Email Institucuional" />
                        <input type="email" name="Correo_PersonalE" id="emailPersonal" placeholder="tu email Personal" />
                        <label for="estado">Estado:
                        <select name="Estado_Estudiante" id="estado">
                            <option value="Graduado">Graduado</option>
                            <option value="Egresado">Egresado</option>
                            <option value="Proceso">Proceso</option>
                        </select>
                    </fieldset>

                    {{-- <fieldset>
                        <legend>Requisitos</legend>
                        <!-- ESTOS DATOS SE GUARDAN EN LA BD TABLA Requisitos -->

                        <label for="ingles">Aprobación de ingles:</label>
                        <select name="valorRequisito" id="ingles">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>

                    </fieldset> --}}

                    <fieldset>
                        <legend>Periodo</legend>
                        <lable for="inicioPeriodo" >Inicio</lable>
                        <select name="Inicio_Periodo" id="inicioPeriodo">
                            @foreach ( $requisitos1 as $requisito1)
                            <option value="{{ $requisito1->Inicio_Periodo }}">{{ $requisito1->Inicio_Periodo }}</option>
                            
                            
                            
                            
                            @endforeach
                        </select>
                        <label for="finPeriodo">Finalizacion</label>
                        <select name="Fin_Periodo" id="finPeriodo">
                            <option value="1">Si</option>
                        </select>
                        <label for="nombrePeriodo">Perido:</label>
                        <select name="Nombre_Periodo" id="nombrePeriodo">
                            <option value="1">Si</option>
                        </select>
                    </fieldset>

                    <fieldset>
                        <legend>Facultad</legend>

                        <label for="facultad">Facultad:</label>
                            <select name="facultad" id="facultad">
                                <option value="ingenieria">Ingenieria</option>
                                <option value="cienciasAdministrativas">Ciencias Administrativas y Economicas</option>
                            </select>
                
                    </fieldset>

                    <fieldset>
                        <legend>Carrera</legend>

                        <label for="NombreCarrera">Carrera:
                            <select name="NombreCarrera" id="NombreCarrera">
                                <option value="TecnologiaInformacion">tecnologias de la informacion</option>
                                <option value="contabilidadAuditoria">Contabilidad y Auditoria</option>
                                <option value="administracionEmpresas">Administracion de Empresas</option>
                                <option value="administracionPublica">Administracion Publica</option>
                            </select>
                        <label for="codigoCarrera">Codigo:</label>
                        <input type="text" name="codigoCarrera" id="codigoCarrera" placeholder="Ingresa el codigo de tu carrera" />
                        <label for="duracionCarrera">Niveles:</label>
                        <input type="number" name="duracionCarrera" id="duracionCarrera" placeholder="Ingresa cuantos semestre tiene tu carrera" />
                        <label for="estadoCarrera">Estado:</label>
                        <input type="text" name="estadoCarrera" id="estadoCarrera" placeholder="ingres si esats graduado/egresado" />


                    </fieldset>

                    <div class="contenedor-botones__accion">
                        <button type="button" class="btn btn-guardar">Guardar</button>
                        <button type="button" class="btn btn-eliminar">Eliminar</button>
                    </div>

                </form>
                <!--*****************************************-->
            </div>
        </div>
    
@endsection