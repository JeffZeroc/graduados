<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel=" shortcut icon" type="images/png" href="{{asset('img/milogo.png')}}">
    <!--ESTILOS AGREGADO-->
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <!-- ************** -->
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <style>
        .admin-elemento__panel{
            color: #fff;
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
            
        }
        .admin-elemento__panel:hover{
            color: #fff;
        }
        #navbarDropdown{
            letter-spacing: 1px;
            color: #fff;
            font-size: 15px;
            background: #222;
            padding: 20px;
            border-radius: 6px;
        }
    </style>

    <div class="wrapper">
        <div class="sidebar">
            <h4><a href="home" class='admin-elemento__panel' >ADMINISTRADOR</a></h4>
                <ul id="navegacion">
               <li>
                    <p id="navbarDropdown" > Usuario: {{ Auth::user()->name }} </p>
                </li>
                    <div id="myDiv">
                        <li @if(request()->is('crearUsuario')) class='active' @endif  class="enlaces" ><a href="{{ route('crearUsuario') }} "><i class="fas fa-regular fa-user"></i>Crear usuario</a></li>
                        <li @if(request()->is('listaUsuarios')) class='active' @endif  class="enlaces"><a href="{{ route('inicio') }}"><i class="fas fa-regular fa-users"></i>Tipo de usuarios</a></li>
                        <li @if(request()->is('requisitosUsuarios')) class='active' @endif class="enlaces"><a href="{{ route('requisitos') }}"><i class="fas fa-address-card"></i>Requisitos Estudiantiles</a></li>
                        <li @if(request()->is('periodoAcademico')) class='active' @endif class="enlaces"><a href="{{ route('periodo') }}"><i class="fas fa-parking"></i>Periodo Académico</a></li>
                        <li @if(request()->is('facultad')) class='active' @endif class="enlaces"><a href="{{ route('facultad') }}"><i class="fas fa-house-user"></i>Facultad</a></li>
                        <li @if(request()->is('carrera')) class='active' @endif class="enlaces"><a href="{{ route('carrera') }}"><i class="fas fa-graduation-cap"></i>Carreras Universitarias</a></li>
                        <li @if(request()->is('restablecerPassword')) class='active' @endif class="enlaces"><a href="{{ route('restablecercontraAdmin') }}"><i class="fas fa-solid fa-key"></i>Restablecer password</a></li>
                    </div>
                    
                    <li>
                        <a  href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesion') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul> 
        </div>
    </div>
    @yield('baseMenu')
</body>
</html>