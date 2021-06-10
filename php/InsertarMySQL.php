<?php
   
   include("Config.php");
   
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   if($db -> connect_error){
      die("Coneccion fallida: ".$db->connect_error);
   }

   else{
      if($_SERVER["REQUEST_METHOD"] == "POST"){

          //Obteniendo los values del formulario
         $boleta1 = $_POST["boleta"];
         $nombre1 = $_POST["nombre"];
         $apPat1 = $_POST["apellidop"];
         $apMat1 = $_POST["apellidom"];
         $fecha = $_POST["fecha"];
         $CURP1 = $_POST["curp"];
         $genero = $_POST['Sexo'];
         $calleynum1 = $_POST["calleynum"];
         $colonia1 = $_POST["col"];
         $codigo = $_POST["postal"];
         $telefono = $_POST["tel"];
         $correo = $_POST["correo"];
         $dirCorre = $_POST["dircor"];
         $escuela1 = $_POST["escuela"];
         $estado1 = $_POST["estado"];
         $nomescuela1 = $_POST["escNombreTxt"];
         $escProme = $_POST["escPromedio"];
         $opcionEsc1 = $_POST["opcionEscom"];
         $correo.= $dirCorre;
        
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
         $sql = "INSERT INTO registroalumnos (NoBoleta, Nombre, ApellidoPaterno, ApellidoMaterno, FechaNacimiento, Genero, CURP, CalleYNumero, Colonia, CodigoPostal, TelefonoOCelular, Correo, EscuelaProcedencia, EntidadFederativa, NombreEscuela, Promedio, OpcionEscom) VALUES ('{$boleta}', '{$nombre}', '{$apPat}', '{$apMat}', '{$fecha}', '{$genero}', '{$CURP}', '{$calleynum}', '{$colonia}', '{$codigo}', {$telefono}, '{$correo}', '{$escuela}', '{$estado}', '{$nomescuela}', '{$escProme}', '{$opcionEsc}')";

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