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
                    <div class="card-header">Crear Nueva Carrera</div>

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
                        <form method="POST" action="{{ route('carrera_save') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name2" class="col-md-4 col-form-label text-md-end">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name2" placeholder="Nombre Carrera" type="text" class="form-control"
                                        name="Nombre_Carrera" value="{{ old('Nombre_Carrera') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name3" class="col-md-4 col-form-label text-md-end">Código</label>

                                <div class="col-md-6">
                                    <input id="name3" placeholder="Código Carrera" type="text" class="form-control"
                                        name="Codigo_Carrera" value="{{ old('Codigo_Carrera') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name4" class="col-md-4 col-form-label text-md-end">Niveles</label>

                                <div class="col-md-6">
                                    <input id="name4" placeholder="1-9" type="number" class="form-control"
                                        name="Duracion_Carrera" value="{{ old('Duracion_Carrera') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name5" class="col-md-4 col-form-label text-md-end">Estado</label>

                                <select name="Estado_Carrera" id="name5" class="col-md-6">
                                    <option value="Habilitado" class="form-control">Habilitado</option>
                                    <option value="Inhabilitado" class="form-control">Inhabilitado</option>
                                </select>
                            </div>
                            <div class="row mb-3">
                                <label for="name6" class="col-md-4 col-form-label text-md-end">Facultad</label>
                                <select name="facultad_id" id="name6" class="col-md-6">
                                    @foreach ($usuarios as $facultad)
                                        <option value="{{ $facultad->id }}" class="form-control">
                                            {{ $facultad->Nombre_Facultad }}</option>
                                    @endforeach
                                </select>
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
                </div>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card contenedor-carrera">
                    <div class="card-header">Listado de Carreras</div>
                    <div class='table-elemento__spacing'>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Carrera</th>
                                    <th scope="col">Código</th>
                                    <th scope="col">Duración</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Facultad</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($carreras->facultade as $carrerae)
                                    {{ $carrerae->Nombre_Facultad }}
                                    @endforeach --}}

                                @foreach ($usuarios as $facultad)
                                    @foreach ($facultad->carreras as $carrera)
                                        <tr>
                                            <td>{{ $carrera->Nombre_Carrera }}</td>
                                            <td>{{ $carrera->Codigo_Carrera }}</td>
                                            <td>{{ $carrera->Duracion_Carrera }}</td>
                                            <td>{{ $carrera->Estado_Carrera }}</td>

                                            <td>{{ $facultad->Nombre_Facultad }}</td>
                                            <td>
                                                <div class="col-md-9 d-flex align-items-center">
                                                    <a href="{{ route('carrera-show', ['id' => $carrera->id]) }}"
                                                        class="btn btn-success me-3">Editar</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
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
