@extends('layouts.menuSecretaria')

@section('title', 'Consultar') 

@section('menuSecretaria')

    <!--Ejemplo tabla con DataTables-->
    
    <div class="container container2">
                    <div class="row">
                            <div class="col-lg-12">
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
                                            <th>Carrera_id</th>
                                            <th>requisitos</th>
                                            <th class="accion">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $periodos as $periodo)
                                            @foreach ($periodo->Estudiantes as $estudiante)
                                        <tr>
                                            <td>{{$estudiante->Cedula_Estudiante}}</td>
                                            <td>{{$estudiante->Nombre_Estudiante}}</td>
                                            {{-- <td>{{$estudiante->Apellido_Estudiante}}</td>                                
                                            <td>{{$estudiante->Telefono_Estudiante}}</td>
                                            <td>{{$estudiante->Nombre_CursoE}}</td>
                                            <td>{{$estudiante->Correo_InstitucionalE}}</td>
                                            <td>{{$estudiante->Correo_PersonalE}}</td>
                                            <td>{{$estudiante->Estado_Estudiante}}</td> --}}
                                            <td>{{$periodo->Nombre_Periodo }}<br>{{$periodo->Inicio_Periodo }}<br>{{$periodo->Fin_Periodo }}</td>
                                            <td>{{$estudiante->Carrera->Nombre_Carrera }}</td>
                                           
                                            <td> 
                                                @foreach ($estudiante->Requisitos as $Requisito)
                                                <p>{{$Requisito->requisito_id}} 
                                                
                                                @if ($Requisito->valorRequisito == 1)
                                                 Aprobado
                                                 @else
                                                 Rechazado
                                                @endif
                                                </p>

                                                @endforeach  
                                            </td>
                                            
                                            <td>
                                                <button type="button" class="btn btn-success" ><a href="{{ route('registrodatosUsuario-show', ['id' => $estudiante->id]) }}" id="color-editar">Editar</a></button>
                                            </td>
                                        </tr>                
                                            @endforeach                                  
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
@endsection



