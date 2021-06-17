<?php

    session_start();
    include("Config.php");
    include("sentenciasSql.php");
    include("GenerarPDF.php");
    include("enviarCorreo.php");


    $doc = generarPdf($_SESSION['boleta'], 'S');

    if(enviarCorreo($doc, $_SESSION['boleta']))
    {
        session_destroy();
        header("Location: /../Proyecto WEB/registroCulminado.html");
    }

?>