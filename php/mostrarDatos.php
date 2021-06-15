<?php

    $_SESSION["boleta"] = $_POST["boleta"];
    $_SESSION["nombre"] = $_POST["nombre"];
    $_SESSION["apellidop"] = $_POST["apellidop"];
    $_SESSION["apellidom"] = $_POST["apellidom"];
    $_SESSION["fecha"] = $_POST["fecha"];
    $_SESSION["curp"] = $_POST["curp"];
    $_SESSION["Sexo"] = $_POST['Sexo'];
    $_SESSION["calleynum"] = $_POST["calleynum"];
    $_SESSION["col"] = $_POST["col"];
    $_SESSION["postal"] = $_POST["postal"];
    $_SESSION["tel"] = $_POST["tel"];
    $_SESSION["correo"] = $_POST["correo"];
    $_SESSION["dircor"] = $_POST["dircor"];
    $_SESSION["escuela"] = $_POST["escuela"];
    $_SESSION["estado"] = $_POST["estado"];
    $_SESSION["escNombreTxt"] = $_POST["escNombreTxt"];
    $_SESSION["escPromedio"] = $_POST["escPromedio"];
    $_SESSION["opcionEscom"] = $_POST["opcionEscom"];

    header("location: /../Proyecto WEB/verificar.html");
?>