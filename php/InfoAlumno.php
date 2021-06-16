<?php
    //Incluyendo Conexion a la base de datos
    include("Config.php");
    session_start();

    if (!isset($_SESSION['login_user'])) {
        header("Location: /../Proyecto WEB/login.html");
        die();
    }

    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   if($db -> connect_error){//Si hay error al conectar a la abse de datos
      die("Coneccion fallida: ".$db->connect_error);
   }
   else
   {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $boleta1 = mysqli_real_escape_string($db,$_POST['txtnumero']);
            $boleta =  strtoupper($boleta1);
            $sql = "SELECT NoBoleta, Nombre, ApellidoPaterno, ApellidoMaterno, FechaNacimiento, Genero, CURP, CalleYNumero, Colonia, CodigoPostal, TelefonoOCelular, Correo, EscuelaProcedencia, EntidadFederativa, NombreEscuela, Promedio, OpcionEscom FROM registroalumnos WHERE NoBoleta = '{$boleta}'";
            $alumno = mysqli_query($db, $sql);
            $datos = mysqli_fetch_array(($alumno));
            $bandera = mysqli_num_rows($alumno);//Almacenamos el valor de filas encontradas
            if($bandera != 1)
            {
                echo "<script>
                    alert('Lo sentimos, no hemos podido encontrar ningún dato con el numero de boleta {$boleta}. Intentelo de nuevo');
                    window.location= '/../Proyecto WEB/buscar.html'
                    </script>";
            }
    }
   }

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
    <title>Informacion del Alumno</title>
</head>
<body>
    <!--Jumbotron-->
    <div class="jumbotron jumbotron-fluid rounded-0 img-jmbo text-center" style="margin-bottom:0">
            <div class="container"><br>
            <h1 id="Bienvenido"><i class="fas fa-user-graduate"></i> Información del alumno</h1>
            <p>A continuación se detallan los datos del estudiante</p>
            <div class="col text-center mt-4">
                <a href="/../Proyecto WEB/eliminar.html" class="btn btn-success mr-3 mb-3" role="button"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                <a href="/../Proyecto WEB/php/CerrarSesion.php" class="btn btn-danger mb-3" role="button">Cerrar Sesión <i class="fas fa-window-close"></i></a>
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
                    <a class="nav-link" href="/../Proyecto WEB/eliminar.html">Eliminar un registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/../Proyecto WEB/php/formulario.php">Crear un registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/../Proyecto WEB/actualizar.html">Actualizar registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/../Proyecto WEB/buscar.html">Buscar Alumno</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/../Proyecto WEB/php/CerrarSesion.php">Cerrar Sesion</a>
                </li>
            </ul>
        </div>
    </nav>

    <!--Búsqueda de Datos-->
    <div class="container p-4 bg-dark mt-3 mb-3">
        <div class="input-group">
            <span class="input-group-prepend">
                <span class="input-group-text bg-dark border-dark">
                    <i class="fas fa-search text-light" id="lupa"></i>
                </span>
            </span>
            <input class="form-control bg-dark border-right-0 text-light" id="myInput" type="text" placeholder="Search..." aria-describedby="lupa">
        </div>
    </div>

    <!--Tabla de Datos Responsiva-->
    <div class="container mt-3 mb-3">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-dark bg-dark">
                <thead>
                    <tr class="text-center">
                        <th>Campo</th>
                        <th>Información</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <tr>
                        <td>Número de boleta</td>
                        <td><?php echo $datos['NoBoleta']; ?></td>
                    </tr>
                    <tr>
                        <td>Nombre(s)</td>
                        <td><?php echo $datos['Nombre']; ?></td>
                    </tr>
                    <tr>
                        <td>Apellido Paterno</td>
                        <td><?php echo $datos['ApellidoPaterno']; ?></td>
                    </tr>
                    <tr>
                        <td>Apellido Materno</td>
                        <td><?php echo $datos['ApellidoMaterno']; ?></td>
                    </tr>
                    <tr>
                        <td>Fecha de Nacimiento</td>
                        <td><?php echo $datos['FechaNacimiento']; ?></td>
                    </tr>
                    <tr>
                        <td>Género</td>
                        <td><?php echo $datos['Genero']; ?></td>
                    </tr>
                    <tr>
                        <td>CURP</td>
                        <td><?php echo $datos['CURP']; ?></td>
                    </tr>
                    <tr>
                        <td>Calle y Número</td>
                        <td><?php echo $datos['CalleYNumero']; ?></td>
                    </tr>
                    <tr>
                        <td>Colonia</td>
                        <td><?php echo $datos['Colonia']; ?></td>
                    </tr>
                    <tr>
                        <td>Código postal</td>
                        <td><?php echo $datos['CodigoPostal']; ?></td>
                    </tr>
                    <tr>
                        <td>Teléfono o celular</td>
                        <td><?php echo $datos['TelefonoOCelular']; ?></td>
                    </tr>
                    <tr>
                        <td>Correo</td>
                        <td><?php echo $datos['Correo']; ?></td>
                    </tr>
                    <tr>
                        <td>Escuela de Procedencia</td>
                        <td><?php echo $datos['EscuelaProcedencia']; ?></td>
                    </tr>
                    <tr>
                        <td>Entidad Federativa</td>
                        <td><?php echo $datos['EntidadFederativa']; ?></td>
                    </tr>
                    <tr>
                        <td>Nombre de la Escuela</td>
                        <td><?php echo $datos['NombreEscuela']; ?></td>
                    </tr>
                    <tr>
                        <td>Promedio</td>
                        <td><?php echo $datos['Promedio']; ?></td>
                    </tr>
                    <tr>
                        <td>Opcion ESCOM</td>
                        <td><?php echo $datos['OpcionEscom']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
     
    <!--Footer-->
    <div class="container-fluid bg-dark text-center p-3">
        <p class="small">&copy;Todos los derechos reservados a la Escuela Superior de Cómputo</p>
    </div>

    <!--JQuery para busqueda-->
    <script language="javascript" type="text/javascript" src="/../Proyecto WEB/js/busqueda.js"></script>
    <noscript>El navegador no soporta Javascript</noscript>
</body>
</html>