@extends('layouts.base')
@section('title', 'Lista de Usuarios') 
@section('baseMenu')
<head>
    <link rel=" shortcut icon" type="images/png" href="{{asset('img/logo-icon.png')}}">
</head>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Actualizar Carrera</div>

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
                            <label for="name2" class="col-md-4 col-form-label text-md-end">Nombre de la Carrera</label>

                            <div class="col-md-6">
                                <input id="name2" placeholder="Sistemas" type="text" class="form-control"  name="Nombre_Carrera" value="{{ $carreras->Nombre_Carrera }}" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name3" class="col-md-4 col-form-label text-md-end">Código de la Carrera</label>

                            <div class="col-md-6">
                                <input id="name3" placeholder="54321" type="text" class="form-control"  name="Codigo_Carrera" value="{{ $carreras->Codigo_Carrera }}" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name4" class="col-md-4 col-form-label text-md-end">Niveles de la Carrera</label>

                            <div class="col-md-6">
                                <input id="name4" placeholder="9" type="number" class="form-control"  name="Duracion_Carrera" value="{{ $carreras->Duracion_Carrera }}" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name5" class="col-md-4 col-form-label text-md-end">Estado de la Carrera</label>
                            <select name="Estado_Carrera" id="name5" class="col-md-6">
                                <option value="Habilitado" class="form-control"  @if ($carreras->Estado_Carrera == 'Habilitado') selected="selected" @endif >Habilitado</option>
                                <option value="Inhabilitado" class="form-control"  @if ($carreras->Estado_Carrera == 'Inhabilitado') selected="selected" @endif >Inhabilitado</option>                            </select>
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
                                <a href="/carrera" class="btn btn-secondary">
                                    Volver
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Actualizar
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