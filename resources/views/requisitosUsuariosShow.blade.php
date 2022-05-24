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
                    <div class="card-header">Actualizar Requisitos</div>
                    @error('nombreRequisito')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    @if (session('success'))
                        <h6 class="alert alert-success">{{ session('success') }}</h6>
                    @endif

                    <form action="{{ route('requerimientos-update', ['id' => $Requerimientos->id]) }}"
                        class="d-inline" method="post">
                        @method('PATCH')
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" placeholder="Nombre Requisito"
                                    name="nombreRequisito" value="{{ $Requerimientos->nombreRequisito }}" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Estado</label>


                            <select name="estado" class="col-md-6">
                                <option value="Activo" @if ($Requerimientos->estado == 'Activo') {{ 'selected' }} @endif>
                                    Activo</option>
                                <option value="Suspendido" @if ($Requerimientos->estado == 'Suspendido') {{ 'selected' }} @endif>
                                    Suspendido</option>
                            </select>

                        </div>
                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="/requisitosUsuarios" class="btn btn-secondary">
                                    Volver
                                </a>
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Quieres modificar?')">
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
