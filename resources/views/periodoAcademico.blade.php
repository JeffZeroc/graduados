@extends('layouts.base')


@section('title', 'Lista de Usuarios') 


@section('baseMenu')
    

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear nuevo periodo académico</div>
                @if (count($errors)>0)
                <div class="alert alert-danger">@foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                    </div>
                @endif
          
            
            @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('periodo_save') }}" >
                    @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Fecha inicio</label>

                            <div class="col-md-6">
                                <input id="name" type="date" class="form-control"  name="Inicio_Periodo" value="{{ old('Inicio_Periodo') }}" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name2" class="col-md-4 col-form-label text-md-end">Fecha Fin</label>

                            <div class="col-md-6">
                                <input id="name2" type="date" class="form-control"  name="Fin_Periodo" value="{{ old('Fin_Periodo') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name3" class="col-md-4 col-form-label text-md-end">Periodo Académico</label>

                            <div class="col-md-6">
                                <input id="name3" type="text" class="form-control"  name="Nombre_Periodo" value="{{ old('Nombre_Periodo') }}">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

               
                    
                <div class="card ">
                    <div class="card-header">Lista de los periodos Académicos</div>
                    <div class='table-elemento__spacing' >
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Fecha inicio</th>
                                    <th scope="col">Fecha Fin</th>
                                    <th scope="col">Periodo Académico</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                

                                @foreach ( $periodos as $periodo)
                                <tr>
                                    <td>{{ $periodo->Inicio_Periodo }}</td>
                                    <td>{{ $periodo->Fin_Periodo }}</td>
                                    <td>{{ $periodo->Nombre_Periodo }}</td>
                                    <td>
                                    <div class="col-md-9 d-flex align-items-center">
                                        <a href="{{ route('periodo-show', ['id' => $periodo->id]) }}" class="btn btn-success me-3">Modificar</a>
                                        
                                        {{-- <form action="{{ route('periodo-delete', ['id' => $periodo->id]) }}" class="d-inline" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" onclick="return confirm('Quieres borrar?')" class="btn btn-danger" value="Borrar">
                                        </form> --}}
                                    </div>
                                    </td>
                                </tr>                                       
                                @endforeach
                            </div>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div> 
  
@endsection