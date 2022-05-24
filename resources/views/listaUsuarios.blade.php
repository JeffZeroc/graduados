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
                        <div class="card-header">Usuarios Registrados</div>
                        <div class='table-elemento__spacing' >
                            @if (session('success'))
                                <h6 class="alert alert-success">{{ session('success') }}</h6>
                            @endif
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
                                    

                                    @foreach ( $UsuariosAdmin as $admins)
                                    <tr>
                                        <td>{{ $admins->name }}</td>
                                        <td>{{ $admins->email }}</td>
                                        <td>@if ($admins->rol == "Colaborador")
                                            Colaborador
                                            @else
                                            {{ $admins->rol }}
                                            @endif
                                        </td>
                                        @if ($admins->estado == 'Inhabilitado')
                                        <td style="background-color: #cf0404c9;
                                        border-radius: 5px;
                                        text-align: center;
                                        display: flex;
                                        justify-content: center;
                                        color: #fff;
                                        margin-right: 20px;">{{ $admins->estado}}</td>
                                        @else
                                        <td style="border-radius: 5px;
                                        text-align: center;
                                        display: flex;
                                        justify-content: center;
                                        margin-right: 20px;">{{ $admins->estado}}</td>
                                        @endif
                                        
                                        <td>
                                        <div class="col-md-9 d-flex align-items-center">
                                            <a href="{{ route('usuario-show', ['id' => $admins->id]) }}" @if ( Auth::user()->id == $admins->id)
                                                style="pointer-events: none; 
                                                cursor: default;opacity: .6;" 
                                                @endif  class="btn btn-success me-3">Editar</a>
                                            
                                            {{-- <form action="{{ url('/listaUsuarios/'.$admins->id) }}" class="d-inline" method="post">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <input type="submit" @if ( Auth::user()->id == $admins->id)
                                                disabled  
                                                @endif onclick="return confirm('Quieres borrar?')" class="btn btn-danger" value="Borrar">
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