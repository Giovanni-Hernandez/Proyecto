<?php
    //Incluyendo Conexion a la base de datos
    include("Config.php");
    session_start();
    if (!isset($_SESSION['login_user'])) {
        header("Location: /../Proyecto WEB/login.html");
        die();
    }

    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    //Codigo de PHP para mostrar infomacion
    $sql = "SELECT * FROM registroalumnos";
    $result = mysqli_query($db, $sql);
    $datos = mysqli_fetch_array(($result));

   

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/../Proyecto WEB/css/bootstrap.min.css">

        <!--Hoja de estilos-->
        <link rel="preload" href="/../Proyecto WEB/css/style.css" as="style" />
        <link href="/../Proyecto WEB/css/style.css" rel="stylesheet">


        <!--Estilo fuente: Roboto-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

        <!--Font Awesome Iconos-->
        <link href="/../Proyecto WEB/css/all.css" rel="stylesheet">
        <script defer src="/Proyecto WEB/js/all.js"></script>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="/../Proyecto WEB/js/bootstrap.min.js"></script>

        <!-- Icono de pagina -->
        <link rel="icon" href="/../Proyecto WEB/img/icono.png">

        <title>Administrador</title>
    </head>
    <body>

    <!--Jumbotron-->
    <div class="jumbotron jumbotron-fluid rounded-0 img-jmbo text-center" style="margin-bottom:0">
            <div class="container"><br>
                <h1 id="Bienvenido">Bienvenido <?php echo $_SESSION['login_user']; ?></h1>
                <p>Seleccione una operaci??n CRUD</p>
                <div class="col text-center mt-4">
                    <a href="/../Proyecto WEB/php/Administrador.php" class="btn btn-success" role="button"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </div>
    </div>

    <!--Barra de navegacion-->
    <nav class="navbar navbar-expand-md sticky-top rounded-0 navbar-dark bg-primary">
        <a class="navbar-brand font-weight-bold zoom" href="#">
            <img src="/../Proyecto WEB/img/escom-blanco.png" alt="IPN" style="width:40px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/../Proyecto WEB/php/eliminar.php">Eliminar un registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/../Proyecto WEB/php/crearSesionAlumno.php">Crear un registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/../Proyecto WEB/php/actualizar.php">Actualizar registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/../Proyecto WEB/php/buscar.php">Buscar Alumno</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/../Proyecto WEB/php/CerrarSesion.php">Cerrar Sesion</a>
                </li>
            </ul>
        </div>
    </nav>

     <!--Menu opciones para mostarr datos-->
     <div class="container mt-4" id="menu">
        <div class="row align-items-center bg-dark">
            <div class="col-md-4 p-4">
                <div class="dropdown">
                <button class="btn btn-outline-danger dropdown-toggle btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mostar Datos por</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/../Proyecto WEB/php/Administrador.php">Datos Personales</a>
                    <a class="dropdown-item" href="/../Proyecto WEB/php/AdminDatosCont.php">Contacto</a>
                    <a class="dropdown-item" href="/../Proyecto WEB/php/AdminDatosProce.php">Procedencia</a>
                </div>
                </div>
            </div>
            <div class="col-md-3 p-4 align-items-center">
                <p class="lead text-center font-weight-bold"><i class="fas fa-graduation-cap"></i> Procedencia</p>
            </div>
            <div class="col-md-5 p-4 input-group"> <!--Busqueda Datos-->
                <span class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark">
                    <i class="fas fa-search" id="lupa"></i>
                    </span>
                </span>
                <input class="form-control bg-dark border-right-0" id="myInput" type="text" placeholder="Search..." aria-describedby="lupa">
            </div>
        </div>
    </div>

    <!--Tabla responsiva-->
    <div class="container mt-3 mb-3">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-dark bg-dark">
                <thead>
                    <tr class="text-center">
                        <th class="align-middle">N??mero de Boleta</th>
                        <th class="align-middle">Nombre(s)</th>
                        <th class="align-middle">Apellido Paterno</th>
                        <th class="align-middle">Apelido Materno</th>
                        <th class="align-middle">Escuela de Procedencia</th>
                        <th class="align-middle">Entidad Federativa</th>
                        <th class="align-middle">Nombre de la Escuela</th>
                        <th class="align-middle">Promedio</th>
                        <th class="align-middle">Opci??n ESCOM</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php
                    //Lenando la tabla con cada uno de los valores que encuentre en la base
                     foreach($result as $row){?>
                        <tr class="text-center">
                            <td class="align-middle"><?php echo $row['NoBoleta']; ?></td>
                            <td class="align-middle"><?php echo $row['Nombre']; ?></td>
                            <td class="align-middle"><?php echo $row['ApellidoPaterno']; ?></td>
                            <td class="align-middle"><?php echo $row['ApellidoMaterno']; ?></td>
                            <td class="align-middle"><?php echo $row['EscuelaProcedencia']; ?></td>
                            <td class="align-middle"><?php echo $row['EntidadFederativa']; ?></td>
                            <td class="align-middle"><?php echo $row['NombreEscuela']; ?></td>
                            <td class="align-middle"><?php echo $row['Promedio']; ?></td>
                            <td class="align-middle"><?php echo $row['OpcionEscom']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <!--Footer-->
    <div class="container-fluid bg-dark text-center p-3 mt-4">
    <p class="small">&copy;Todos los derechos reservados a la Escuela Superior de C??mputo</p>
    </div>
    
    <!--JQuery para busqueda-->
    <script language="javascript" type="text/javascript" src="/../Proyecto WEB/js/busqueda.js"></script>
    <noscript>El navegador no soporta Javascript</noscript>
    </body>
</html>
