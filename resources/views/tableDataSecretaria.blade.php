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
                                            <th class="accion"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($estudiantes as $re)
                                        <tr>
                                            <td>{{$re->Cedula_Estudiante}}</td>
                                            <td>{{$re->Nombre_Estudiante}}</td>
                                            {{-- <td>{{$estudiante->Apellido_Estudiante}}</td>                                
                                            <td>{{$estudiante->Telefono_Estudiante}}</td>
                                            <td>{{$estudiante->Nombre_CursoE}}</td>
                                            <td>{{$estudiante->Correo_InstitucionalE}}</td>
                                            <td>{{$estudiante->Correo_PersonalE}}</td>
                                            <td>{{$estudiante->Estado_Estudiante}}</td> --}}
                                            <td>{{$re->periodo->Nombre_Periodo }}<br>{{$re->periodo->Inicio_Periodo }}<br>{{$re->periodo->Fin_Periodo }}</td>
                                            <td>{{$re->Carrera->Nombre_Carrera }}</td>
                                           
                                            <td> 
                                                @foreach ($estudianteRequisitos as $r)

                                                    <p>{{$r->Requisitos1 ->nombreRequisito}}   
                                                
                                                    @if ($r->valorRequisito == 1)
                                                     Aprobado
                                                     @else
                                                     Rechazado
                                                    @endif
                                                    </p>
                                                    
                                                @endforeach
                                            </td>
                                            
                                            <td>
                                                <button type="button" class="btn btn-success" ><a href="{{ route('registrodatosUsuario-show', ['id' => $re->id]) }}" id="color-editar"><svg style="color: #fff"xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                  </svg></a></button>
                                            </td>
                                        </tr>                
                                                                            
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



