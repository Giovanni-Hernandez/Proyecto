<?php

    include("Config.php");
    include("sentenciasSql.php");
    include("GenerarPDF.php");

    if (existeAlumno($_POST['boleta']))
    {
        generarPdf($_POST['boleta'], 'D');
    }
    else
    {
        echo "<script>
                 alert('No existe un alumno con boleta {$_POST['boleta']}');
                 window.location= '/../Proyecto WEB/recuperar.html'
                 </script>";
    }
?>