<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="../../../public/css/menuSecretariaEstilos.css">
    
    <!--TODO: AKI VAN A IR  LOS LINK DE LOS ARCHIVOS PARA EL FUNIONAMIENTO DE LA TABLA. -->
    <!-- LINK PARA DATATABLE -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../public/tableDataSecretaria/bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="../../../public/tableDataSecretaria/main.css">  
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="../../../public/tableDataSecretaria/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="../../../public/tableDataSecretaria/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  

    <!-- ************************************************************** -->

</head>
<body>

    <div class="wrapper">
        <div class="sidebar">
            <img src="../../../public/img/graduados.png" alt="imagen graduados-panelSecretaria">
            <h2>SECRETARIA</h2>
            <ul>
                <div class="userName">
                    <li><p>USUARIO: Ingresadoo</p></li>
                </div>
            

                <li><a href="#"><i class="fas fa-solid fa-address-card"></i>Registrar graduado</a></li>
                <li><a href="#"><i class="fas fa-search"></i>Consular</a></li>
                <li><a href="#">Cerrar sesion</a></li>

            </ul>
        </div>
        <div class="main_content">
            <div class="header">SISTEMA DE CONTROL DE INFORMACION A GRADUADOS</div>

            <div class="table-filtrar">

                <!--TODO: ESTE VA HACER EL CONTENEDOR DE LA TABLA Y DE REGISTRO DE DATOS, DENTRO DE ESTE DIV.-->





                <!--********  AKI VAN  LOS SCRIPT PARA QUE FUNCIONE LA DATATABLE ***********************-->
                    <!-- jQuery, Popper.js, Bootstrap JS -->
                    <script src="../../../public/tableDataSecretaria/jquery/jquery-3.3.1.min.js"></script>
                    <script src="../../../public/tableDataSecretaria/popper/popper.min.js"></script>
                    <script src="../../../public/tableDataSecretaria/bootstrap/js/bootstrap.min.js"></script>
                    
                    <!-- datatables JS -->
                    <script type="text/javascript" src="../../../public/tableDataSecretaria/datatables/datatables.min.js"></script>    
                    
                    <!-- para usar botones en datatables JS -->  
                    <script src="../../../public/tableDataSecretaria/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
                    <script src="../../../public/tableDataSecretaria/datatables/JSZip-2.5.0/jszip.min.js"></script>    
                    <script src="../../../public/tableDataSecretaria/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
                    <script src="../../../public/tableDataSecretaria/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
                    <script src="../../../public/tableDataSecretaria/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
                    
                    <!-- código JS propìo-->    
                    <script type="text/javascript" src="../../../public/tableDataSecretaria/main.js"></script>  

                <!--*****************************************-->
            </div>
        </div>
    </div>
    @yield('menuSecretaria')
</body>
</html>