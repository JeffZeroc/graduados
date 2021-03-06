@extends('layouts.base')


@section('title', 'Lista de Usuarios') 


@section('baseMenu')
    

    <head>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel=" shortcut icon" type="images/png" href="{{asset('img/logo-icon.png')}}">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-header">Actualizar Usuario</div>
                        <div class='table-elemento__spacing' >
                            <form action="{{ route('usuario-save', ['id' => $UsuariosAdmin->id]) }}" method="POST">
                                @method('PATCH')
                                @csrf
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                @error('rol')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Perfil</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    {{-- @foreach ( $UsuariosAdmin as $admins)
                                    <tr>
                                        <td>{{ $admins->name }}</td>
                                        <td>steven@gmail.com</td>
                                        <td>administrador</td>
                                        <td>
                                        <button type="button" class="btn btn-danger">Eliminar</button>
                                        </td>
                                    </tr>                                       
                                    @endforeach --}}
                                    

                                   
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control mb-2" name="name" id="exampleFormControlInput1" placeholder="Nombre" value="{{ $UsuariosAdmin->name }}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control mb-2" name="email" id="exampleFormControlInput1" placeholder="Email" value="{{ $UsuariosAdmin->email }}">
                                        </td>
                                        <td>
                                            <select name="rol" class="py-2" id="">
                                                <option value="{{ $UsuariosAdmin->rol }}">
                                                @if ($UsuariosAdmin->rol == "Colaborador")
                                                    Colaborador
                                                    @else
                                                    {{ $UsuariosAdmin->rol }}
                                                @endif
                                                </option>
                                                
                                                @if ($UsuariosAdmin->rol == "Colaborador")
                                                <option value="Administrador">Administrador</option>
                                                @else
                                                <option value="Colaborador">Colaborador</option>
                                                @endif
                                            </select>
                                            
                                        </td>
                                        <td>
                                            <select name="estado" class="py-2" id="">
                                                <option  value="{{ $UsuariosAdmin->estado }}" @if ($UsuariosAdmin->estado == "Habilitado")
                                                    selected
                                                    @elseif ($UsuariosAdmin->estado == "Inhabilitado")
                                                    selected
                                                @endif>
                                                @if ($UsuariosAdmin->estado == "Habilitado")
                                                    Habilitado
                                                    @else
                                                    Inhabilitado
                                                @endif
                                                </option>
                                                
                                                @if ($UsuariosAdmin->estado == "Habilitado")
                                                <option value="Inhabilitado">Inhabilitado</option>
                                                @else
                                                <option value="Habilitado">Habilitado</option>
                                                @endif
                                            </select>
                                            {{-- <select name="estado" class="py-2" id="">
                                                <option value="Habilitado">Habilitado</option>
                                                <option value="Inhabilitado">Inhabilitado</option>
                                            </select> --}}
                                        </td>
                                        <td>
                                        <div class="col-md-9 d-flex align-items-center">
                                            
                                            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal{{$UsuariosAdmin->id}}">Actualizar</a>
                                           
                                            
                                        </div>
                                        </td>
                                    </tr>                                       
                                 

                                </tbody>
                            </table>
                            {{-- modal --}}
                            <div class="modal fade" id="modal{{$UsuariosAdmin->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Actualizar registro</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ??Est?? seguro que desea actualizar el registro de <strong>{{ $UsuariosAdmin->name }}</strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, cancelar</button>
                                       
                                            
                                            <button type="submit" class="btn btn-primary">S??, actualizar registro</button>
                                        </form>
                                        
                                    
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
  
@endsection