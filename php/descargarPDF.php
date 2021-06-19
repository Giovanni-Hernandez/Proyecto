<?php

    include("Config.php");
    include("sentenciasSql.php");
    include("GenerarPDF.php");

    if (existeCurp($_POST['curp']))
    {
        $boleta = obtenerBoletaCurp($_POST['curp']);
        generarPdf($boleta, 'D');
    }
    else
    {
        echo "<script>
                 alert('No existe un alumno con CURP: {$_POST['curp']}');
                 window.location= '/../Proyecto WEB/recuperar.html'
                 </script>";
    }
?>