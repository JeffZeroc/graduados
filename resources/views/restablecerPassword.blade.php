@extends('layouts.base')

@section('title', 'Restablecer Password')

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
                    <div class="card-header text-center">{{ __('Restablecer Password.') }}
                        <p class="text-center">¿Tienes problemas para iniciar sesión?</p>
                        <p class="text-center">Ingresa tu correo electrónico y te enviaremos un enlace a tu correo para que recuperes el acceso a tu cuenta.</p>
                    </div>
                    <div class='table-elemento__spacing' >

                       
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                        <form>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Enviar') }}
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