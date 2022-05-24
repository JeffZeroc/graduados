@extends('layouts.base')
@section('title', 'Lista de Usuarios')
@section('baseMenu')

    <head>
        <link rel="stylesheet" href="{{ asset('css/base.css') }}">
        <link rel=" shortcut icon" type="images/png" href="{{ asset('img/logo-icon.png') }}">
    </head>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Requisitos</div>
                    @error('nombreRequisito')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    @if (session('success'))
                        <h6 class="alert alert-success">{{ session('success') }}</h6>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('requisitos_save') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" placeholder="Nombre Requisito"
                                        name="nombreRequisito" value="{{ old('nombreRequisito') }}" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Estado</label>


                                <select name="estado" class="col-md-6">
                                    <option value="Activo" @if (old('estado') == 'Activo') {{ 'selected' }} @endif>
                                        Activo</option>
                                    <option value="Suspendido" @if (old('estado') == 'Suspendido') {{ 'selected' }} @endif>
                                        Suspendido</option>
                                </select>

                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" >
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            
                <div class="col-md-8">
                    <div class="card contenedor-requisitos ">
                        <div class="card-header">Lista de Requisitos</div>
                        <div class='table-elemento__spacing'>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Accion</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($datos as $requisito)
                                        <tr>
                                            <td>{{ $requisito->nombreRequisito }}</td>
                                            <td>{{ $requisito->estado }}</td>
                                            <td>
                                                <div class="col-md-9 d-flex align-items-center">
                                                    <a href="{{ route('requerimientos-show', ['id' => $requisito->id]) }}"
                                                        class="btn btn-success me-3">Editar</a>

                                                    {{-- <form action="{{ route('requerimientos-delete', ['id' => $requisito->id]) }}" class="d-inline" method="post">
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

@endsection
