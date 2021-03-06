<?php
    include("Config.php");
    session_start();
    if (!isset($_SESSION['login_user'])) {
        header("Location: /../Proyecto WEB/login.html");
        die();
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
    <script src="/../Proyecto WEB/js/validacionForm.js"></script>
    <script src="/../Proyecto WEB/js/valForm.js"></script>

    <!-- Icono de pagina -->
    <link rel="icon" href="/../Proyecto WEB/img/icono.png">

    <title>Eliminar Registro</title>
</head>

<body>
    <!--Jumbotron-->
    <div class="jumbotron jumbotron-fluid rounded-0 img-jmbo text-center" style="margin-bottom:0">
        <div class="container"><br>
            <h1 id="Bienvenido"><i class="far fa-trash-alt"></i> Eliminar registro de alumno</h1>
            <p>Por favor, ingrese el n??mero de boleta del estudiante</p>
            <div class="col text-center mt-4">
                <a href="/../Proyecto WEB/php/Administrador.php" class="btn btn-success" role="button"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
            </div>
        </div>
    </div>

    <!--Contenedor Administrador-->
    <div class="contact-box mt-3">
        <div class="container bg-dark p-6">
            <div class="user-img">
                <img src="/../Proyecto WEB/img/admin.png" class="img-fluid img-thumbnail rounded-circle mx-auto d-block zoom " alt="ESCOM ">
            </div>

            <!--Formulario Eliminar Registro-->
            <form action="/../Proyecto WEB/php/EliminarRegistro.php" method="POST" onsubmit="return valCampo()" class="needs-validation" autocomplete="off" novalidate>
                <div class="form-group">
                    <label for="txtnumero">No. de boleta<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" maxlength="10" id="txtnumero" name="txtnumero" onkeypress="return valiBoleta(event)" style="text-transform: uppercase;" required>

                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-outline-primary btn-block btn-lg mt-3">Buscar <i class="fas fa-search-plus"></i></button>
                    </div>
                    <div class="col-sm-6">
                        <a href="/../Proyecto WEB/php/CerrarSesion.php" class="btn btn-outline-danger btn-block btn-lg mt-3" role="button">Cerar sesi??n <i class="fas fa-window-close"></i></a>
                    </div>
                </div>
            </form>
            <small class="d-inline-block text-muted mt-3">Instituto Polit??cnico Nacional | Escuela Superior de C??mputo | 2021</small>
        </div>
    </div>

    <!--Footer-->
    <div class="container-fluid bg-dark text-center p-3 mt-3">
        <p class="small">&copy;Todos los derechos reservados a la Escuela Superior de C??mputo</p>
    </div>

    <!--Validacion de formulario por JScript-->
    <script src="/../Proyecto WEB/js/validarCampo.js"></script>
    <script language="javascript" type="text/javascript" src="/../Proyecto WEB/js/script1.js"></script>
    <noscript>El navegador no soporta Javascript</noscript>
</body>

</html>