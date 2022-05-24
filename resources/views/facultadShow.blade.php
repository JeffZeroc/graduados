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
                <div class="card-header">Actualizar Facultad</div>

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
                    <form method="POST" action="{{ route('facultad_update', ['id' => $facultades->id]) }}" >
                    @csrf
                    @method('PATCH')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control"  name="Nombre_Facultad" value="{{ $facultades->Nombre_Facultad }}" autofocus>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="/facultad" class="btn btn-secondary">
                                    Volver
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- @foreach ($facultades->carreras as $todo )
                <div class="row py-1">
                    {{ $todo->Nombre_Carrera }}
                </div>
                @endforeach     --}}
                    
                
                </div>

            </div>
        </div>
    </div>
</div> 
  
@endsection