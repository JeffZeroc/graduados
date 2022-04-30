@extends('layouts.base')
@section('title', 'Lista de Usuarios') 
@section('baseMenu')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modificar carrera</div>

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
                    <form method="POST" action="{{ route('carrera_update', ['id' => $carreras->id]) }}" >
                    @csrf
                    @method('PATCH')
                        <div class="row mb-3">
                            <label for="name1" class="col-md-4 col-form-label text-md-end">Codigo Ejecutar</label>

                            <div class="col-md-6">
                                <input id="name1" placeholder="12345" type="number" class="form-control"  name="CODIGO_EJECUTAR" value="{{ $carreras->CODIGO_EJECUTAR }}" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name2" class="col-md-4 col-form-label text-md-end">Nombre de la Carrera</label>

                            <div class="col-md-6">
                                <input id="name2" placeholder="Sistemas" type="text" class="form-control"  name="Nombre_Carrera" value="{{ $carreras->Nombre_Carrera }}" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name3" class="col-md-4 col-form-label text-md-end">Código de la Carrera</label>

                            <div class="col-md-6">
                                <input id="name3" placeholder="54321" type="number" class="form-control"  name="Codigo_Carrera" value="{{ $carreras->Codigo_Carrera }}" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name4" class="col-md-4 col-form-label text-md-end">Duración de la Carrera</label>

                            <div class="col-md-6">
                                <input id="name4" placeholder="9" type="number" class="form-control"  name="Duracion_Carrera" value="{{ $carreras->Duracion_Carrera }}" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name5" class="col-md-4 col-form-label text-md-end">Estado de la Carrera</label>

                            <div class="col-md-6">
                                <input id="name5" placeholder="Habilitado" type="text" class="form-control"  name="Estado_Carrera" value="{{ $carreras->Estado_Carrera }}" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name6" class="col-md-4 col-form-label text-md-end">Facultad</label>
                            <select name="facultad_id" id="name6" class="col-md-6">
                                @foreach ( $usuarios as $facultad)
            
                                <option value="{{ $facultad->id}}" @if ($facultad->id == $carreras->facultad_id) selected="selected"  @endif class="form-control">{{ $facultad->Nombre_Facultad}}</option>
                                                        
                                @endforeach
                            </select>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Modificar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

               
                    
                

                </div>

            </div>
        </div>
    </div>
</div> 
  
@endsection