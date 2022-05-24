@extends('layouts.base')


@section('title', 'Lista de Usuarios')


@section('baseMenu')

    <head>
        <link rel=" shortcut icon" type="images/png" href="{{ asset('img/logo-icon.png') }}">
    </head>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Actualizar Periodo Académico</div>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif

                    @if (session('success'))
                        <h6 class="alert alert-success">{{ session('success') }}</h6>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('periodo_update', ['id' => $periodos->id]) }}">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-3">
                                <label for="name3" class="col-md-4 col-form-label text-md-end">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name3" type="text" class="form-control" name="Nombre_Periodo"
                                        placeholder="Nombre Periodo Académico" value="{{ $periodos->Nombre_Periodo }}" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name3" class="col-md-4 col-form-label text-md-end">Código</label>

                                <div class="col-md-6">
                                    <input id="name3" type="text" class="form-control" name="codigo"
                                        placeholder="Código Periodo Académico" value="{{ $periodos->codigo }}" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Fecha inicio</label>

                                <div class="col-md-6">
                                    <input id="name" type="date" class="form-control" name="Inicio_Periodo"
                                        value="{{ $periodos->Inicio_Periodo }}" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name2" class="col-md-4 col-form-label text-md-end">Fecha Fin</label>

                                <div class="col-md-6">
                                    <input id="name2" type="date" class="form-control" name="Fin_Periodo"
                                        value="{{ $periodos->Fin_Periodo }}">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a href="/periodoAcademico" class="btn btn-secondary">
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
