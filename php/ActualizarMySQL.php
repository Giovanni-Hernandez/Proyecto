<?php
   
   include("Config.php");
   session_start();
   if (!isset($_SESSION['login_user'])) {
      header("Location: /../Proyecto WEB/login.html");
      die();
  }
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
         $escuela1 = $_POST["escuela"];
         $estado1 = $_POST["estado"];
         $nomescuela1 = $_POST["escNombreTxt"];
         $escProme = $_POST["escPromedio"];
         $opcionEsc1 = $_POST["opcionEscom"];

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
         $sql = "UPDATE registroalumnos SET Nombre = '{$nombre}', ApellidoPaterno = '{$apPat}', ApellidoMaterno = '{$apMat}', FechaNacimiento = '{$fecha}', Genero = '{$genero}', CURP = '{$CURP}', CalleYNumero = '{$calleynum}', Colonia = '{$colonia}', CodigoPostal = '{$codigo}', TelefonoOCelular = '{$telefono}', Correo = '{$correo}', EscuelaProcedencia = '{$escuela}', EntidadFederativa = '{$estado}', NombreEscuela = '{$nomescuela}', Promedio = '{$escProme}', OpcionEscom = '{$opcionEsc}' WHERE NoBoleta = '{$boleta}' ";

         //Metiedno el valor a la base de datos

         if(mysqli_query($db, $sql)){
            header("location: /../Proyecto WEB/php/Administrador.php");
         }
         else{
            echo "Error " .$sql . "<br>" . mysqli_error($db);
         }
 
     }
    
   }


?>