<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!--ESTILOS AGREGADO-->
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">
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
            color: green;
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
            <h4  ><a href="/home" class='admin-elemento__panel' >ADMINISTRADOR</a></h4>
                <ul>
                <li>
                    <p id="navbarDropdown" > Usuario: {{ Auth::user()->name }} </p>
                </li>
                    <li><a href="/crearUsuario"><i class="fas fa-regular fa-user"></i>Crear usuario</a></li>
                    <li><a href="/listaUsuarios"><i class="fas fa-regular fa-users"></i>Ver lista de usuarios</a></li>
                    <li><a href="/restablecerPassword" ><i class="fas fa-solid fa-key"></i>Restablecer password</a></li>
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