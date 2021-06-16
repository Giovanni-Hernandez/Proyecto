<?php
   
   session_start();
   include("Config.php");
   
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   if($db -> connect_error){
      die("Coneccion fallida: ".$db->connect_error);
   }

   else{
      if($_SERVER["REQUEST_METHOD"] == "POST"){

          //Obteniendo los values del formulario
         $boleta1 = $_SESSION['boleta'];
         $nombre1 = $_SESSION['nombre'];
         $apPat1 = $_SESSION['apellidop'];
         $apMat1 = $_SESSION['apellidom'];
         $fecha = $_SESSION['fecha'];
         $CURP1 = $_SESSION['curp'];
         $genero = $_SESSION['Sexo'];
         $calleynum1 = $_SESSION['calleynum'];
         $colonia1 = $_SESSION['col'];
         $codigo = $_SESSION['postal'];
         $telefono = $_SESSION['tel'];
         $correo = $_SESSION['correo'];
         $dirCorre = $_SESSION['dircor'];
         $escuela1 = $_SESSION['escuela'];
         $estado1 = $_SESSION['estado'];
         $nomescuela1 = $_SESSION['escNombreTxt'];
         $escProme = $_SESSION['escPromedio'];
         $opcionEsc1 = $_SESSION['opcionEscom'];
         $correo.= $dirCorre;

         session_destroy();
        
         $boleta = strtoupper($boleta1);
         $nombre = strtoupper($nombre1);
         $apPat = strtoupper($apPat1);
         $apMat = strtoupper($apMat1);
         $CURP = strtoupper($CURP1);
         $calleynum = strtoupper($calleynum1);
         $colonia = strtoupper($colonia1);
         $escuela = strtoupper($escuela1);
         $estado = strtoupper($estado1);
         $nomescuela = strtoupper($nomescuela1);
         $opcionEsc = strtoupper($opcionEsc1);

         //Comando de MySQL
         $sql = "CALL inscribir ('{$boleta}', '{$nombre}', '{$apPat}', '{$apMat}', '{$fecha}', '{$genero}', '{$CURP}', '{$calleynum}', '{$colonia}', '{$codigo}', {$telefono}, '{$correo}', '{$escuela}', '{$estado}', '{$nomescuela}', '{$escProme}', '{$opcionEsc}')";

         //Metiedno el valor a la base de datos

         if(mysqli_query($db, $sql)){
            header("location: /../Proyecto WEB/ImprimirPDF.html");
         }
         else{
            echo "Error " .$sql . "<br>" . mysqli_error($db);
         }
 
     }
    
   }


?>