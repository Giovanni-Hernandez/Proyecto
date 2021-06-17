<?php

    session_start();
    include("Config.php");
    include("GenerarPDF.php");

    generarPdf($_POST['boleta'], 'D');
?>