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
                                                    @if ($r->estudiante_id == $re->id)
                                                        <p>{{$r->Requisitos1 ->nombreRequisito}}   
                                                
                                                        @if ($r->valorRequisito == 1)
                                                            Aprobado
                                                        @else
                                                            Rechazado
                                                        @endif
                                                        </p>
                                                    @endif
                                                    
                                                @endforeach
                                            </td>
                                            
                                            <td>
                                                <button type="button" class="btn btn-success" ><a href="{{ route('registrodatosUsuario-show', ['id' => $re->id]) }}" id="color-editar">Editar</a></button>
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



