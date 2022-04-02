@extends('layouts.base')


@section('title', 'Lista de Usuarios') 


@section('baseMenu')
    

    <head>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-header">{{ __('Lista todos los usuarios registrados.') }}</div>
                        <div class='table-elemento__spacing' >
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Perfil</th>
                                        <th scope="col">Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Steven</td>
                                        <td>steven@gmail.com</td>
                                        <td>administrador</td>
                                        <td>
                                        <button type="button" class="btn btn-danger">Eliminar</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>maria</td>
                                        <td>maria@gmail.com</td>
                                        <td>secretaria</td>
                                        <td>
                                        <button type="button" class="btn btn-danger">Eliminar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
  
  
@endsection