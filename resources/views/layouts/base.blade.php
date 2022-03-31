<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>este es el documento base</title>
    <!--ESTILOS AGREGADO-->
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <!-- ************** -->

</head>
<body>

    <div class="wrapper">
        <div class="sidebar">
            <h4>Administrador</h4>
                <ul>
                <li>
                    <p id="navbarDropdown" > Usuario: {{ Auth::user()->name }} </p>
                </li>
                    <li><a href="#"><i class="fas fa-regular fa-user"></i>Crear usuario</a></li>
                    <li><a href="#"><i class="fas fa-regular fa-users"></i>Ver lista de usuarios</a></li>
                    <li><a href="#"><i class="fas fa-solid fa-key"></i>Restablecer password</a></li>
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

   
</body>
</html>