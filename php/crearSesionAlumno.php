<?php
    session_start();

    $_SESSION["boleta"] = "";
    $_SESSION["nombre"] = "";
    $_SESSION["apellidop"] = "";
    $_SESSION["apellidom"] = "";
    $_SESSION["fecha"] = "";
    $_SESSION["curp"] = "";
    $_SESSION["Sexo"] = "";
    $_SESSION["calleynum"] = "";
    $_SESSION["col"] = "";
    $_SESSION["postal"] = "16720";
    $_SESSION["tel"] = "";
    $_SESSION["correo"] = "";
    $_SESSION["dircor"] = "@gmail.com";
    $_SESSION["escuela"] = "Selecciona tu escuela de procedencia";
    $_SESSION["estado"] = "Selecciona tu estado de procedencia";
    $_SESSION["escNombreTxt"] = "";
    $_SESSION["escPromedio"] = "";
    $_SESSION["opcionEscom"] = "Selecciona la opción";

    header("location: /../Proyecto WEB/php/formulario.php");
    exit();
?>