<?php
   
   session_start();
   include("Config.php");
   include("sentenciasSql.php");
   
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
        
         $boleta = mb_strtoupper($boleta1, 'UTF-8');
         $nombre = mb_strtoupper($nombre1, 'UTF-8');
         $apPat = mb_strtoupper($apPat1, 'UTF-8');
         $apMat = mb_strtoupper($apMat1, 'UTF-8');
         $CURP = mb_strtoupper($CURP1, 'UTF-8');
         $calleynum = mb_strtoupper($calleynum1, 'UTF-8');
         $colonia = mb_strtoupper($colonia1, 'UTF-8');
         $escuela = mb_strtoupper($escuela1, 'UTF-8');
         $estado = mb_strtoupper($estado1, 'UTF-8');
         $nomescuela = mb_strtoupper($nomescuela1, 'UTF-8');
         $opcionEsc = mb_strtoupper($opcionEsc1, 'UTF-8');

         if($escuela == 'OTRO')
         {
            $escuela = $nomescuela;
         }

         //Comando de MySQL
         $sql = "CALL inscribir ('{$boleta}', '{$nombre}', '{$apPat}', '{$apMat}', '{$fecha}', '{$genero}', '{$CURP}', '{$calleynum}', '{$colonia}', '{$codigo}', {$telefono}, '{$correo}', '{$escuela}', '{$estado}', '{$nomescuela}', '{$escProme}', '{$opcionEsc}')";

         //Metiedno el valor a la base de datos

         if(existeAlumno($boleta)){
            echo "<script>
                 alert('Ya existe un alumno con boleta {$boleta}');
                 window.location= '/../Proyecto WEB/index.html'
                 </script>";
         }
         else if(mysqli_query($db, $sql)){
            header("Location: /../Proyecto WEB/php/generarCorreo.php");
         }
         else{
            echo "<script>
                 alert('El registro no se pudo concretar');
                 window.location= '/../Proyecto WEB/index.html'
                 </script>";
         }
 
     }
    
   }


?>