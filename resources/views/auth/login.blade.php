@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card efecto_Sonbra efecto-login ">
                    <style>
                        .efecto_Sonbra {
                            -webkit-box-shadow: 4px 12px 19px 6px rgba(0, 0, 0, 0.75);
                            -moz-box-shadow: 4px 12px 19px 6px rgba(0, 0, 0, 0.75);
                            box-shadow: 4px 12px 19px 6px rgba(0, 0, 0, 0.75);
                        }

                        body {
                            background-repeat: no-repeat;
                            background-attachment: fixed;
                            background-size: cover;
                            background-image: url({{ url('img/utelvt_Concordia.png') }});
                        }

                    </style>

                    <div class="card-header text-center ">
                        <img src="{{ asset('img/ESCUDETO_UTE-LVT.png') }}" style=" display: inline-block;
                                    width: 15%;
                                    margin: auto;" alt="img-utelvt">
                        <br>
                        <b>{{ __('INICIAR SESION') }} </b>
                        <p class="text-center">¡Hola! Bienvenido de vuelta</p>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            {{-- <div class="row mb-3">
                            <label for="text" class="col-md-4 col-form-label text-md-end">{{ __('Selecciona tu perfil') }}</label>
                            <div class="col-md-6">
                                <select class="form-select  mb-3" name="rol" >
                                <option value="secretaria">Secretaria</option>
                                <option value="administrador">Administrador</option>
                            </div>
                        </select>
                        </div> --}}

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>


                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">


                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Recordar password') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Inicia sesión') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Olvidaste tu contraseña?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
