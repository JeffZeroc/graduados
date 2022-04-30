@extends('layouts.base') <!--le indicamos que se traiga la vista, es como heredar.-->

@section('title', 'Crear Usuarios') <!--esto pone el title en las pestanias, esto av en cada una de las vistas.-->

@section('baseMenu') <!--esto es lo que se la a traer, es decir va a tarves todo lo q este en al vista base, dentro de esa vista agregamos @yieldbaseMenu le damos cualquier nonbre-->
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crear Usuarios</title>
        <link rel=" shortcut icon" type="images/png" href="{{asset('img/logo-icon.png')}}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Crear usuario') }}</div>
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

                            <form method="POST" action="{{ route('user.store') }}">
                                @csrf
                                
                                    <div class="box-body">
                                        
                                        <div class="row mb-3">
                                            <label for="text" class="col-md-4 col-form-label text-md-end">{{ __('Selecciona tu perfil') }}</label>
                                            <div class="col-md-6">
                                                <select class="form-select  mb-3" name="rol" >
                                                    <option value="secretaria">Secretaria</option>
                                                    <option value="administrador">Administrador</option>
                                                </select>  
                                            </div>
                                        <div>
                                        <div class="row mb-3">
                                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="row mb-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="row mb-3">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer mt20">
                                        
                                        <button type="submit" class="btn btn-primary">Guardar</button>
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
