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
                <div class="card-header">Actualizar Requisitos</div>
            @error('nombreRequisito')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    
            @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

               
                    
                <div class="card ">
                    
                    <div class='table-elemento__spacing' >
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <form action="{{ route('requerimientos-update', ['id' => $Requerimientos->id]) }}" class="d-inline" method="post">
                                    @method('PATCH')
                                    @csrf
                                
                                <tr>
                                    <td><input type="text" class="form-control mb-2" name="nombreRequisito" id="exampleFormControlInput1" placeholder="Nombre" value="{{ $Requerimientos->nombreRequisito }}"></td>
                                    <td>
                                    <div class="col-md-9 d-flex align-items-center">
                                        
                                       
                                            <input type="submit" onclick="return confirm('Quieres modificar?')" class="btn btn-success" value="Actualizar">
                                        </form>
                                    </div>
                                    </td>
                                </tr>                                       
                               
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