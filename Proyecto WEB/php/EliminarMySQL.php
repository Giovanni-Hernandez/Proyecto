<?php
    //Incluyendo Conexion a la base de datos
    include("Config.php");
    session_start();
    if (!isset($_SESSION['login_user'])) {
      header("Location: /../Proyecto WEB/login.html");
      die();
   }
   
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   if($db -> connect_error){//Si hay error al conectar a la abse de datos
      die("Coneccion fallida: ".$db->connect_error);
   }

   else{
      if($_SERVER["REQUEST_METHOD"] == "POST"){

        //Obteniendo el input del formulario
        $boleta = mysqli_real_escape_string($db,$_POST['txtnumero']);
        echo $boleta;
        //Codigo y ejucion del SQL query
        $sqlcodgo = "DELETE FROM registroalumnos WHERE NoBoleta = {$boleta}";
        $result = mysqli_query($db,$sqlcodgo);
        header("location: /../Proyecto WEB/php/Administrador.php");
     }
    
   }

?>