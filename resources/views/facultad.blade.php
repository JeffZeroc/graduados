@extends('layouts.base')


@section('title', 'Lista de Usuarios') 


@section('baseMenu')
    

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear nueva facultad</div>

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
                    <form method="POST" action="{{ route('facultad_save') }}" >
                    @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nombre de la facultad</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control"  name="Nombre_Facultad" value="{{ old('Nombre_Facultad') }}" autofocus>
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
                    <div class="card-header">Lista de las facultades</div>
                    <div class='table-elemento__spacing' >
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Facultad</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                

                                @foreach ( $facultades as $facultad)
                                <tr>
                                    <td>{{ $facultad->Nombre_Facultad }}</td>
                                    <td>
                                    <div class="col-md-9 d-flex align-items-center">
                                        <a href="{{ route('facultad-show', ['id' => $facultad->id]) }}" class="btn btn-success me-3">Modificar</a>
                                        
                                        {{-- <form action="{{ route('facultad-delete', ['id' => $facultad->id]) }}" class="d-inline" method="post">
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