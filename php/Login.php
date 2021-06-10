<?php
    //Conctado a la base de datos
    include("Config.php");
    session_start();

    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   if($db -> connect_error){//Si hay error al conectar a la abse de datos
      die("Coneccion fallida: ".$db->connect_error);
   }

   else{
      if($_SERVER["REQUEST_METHOD"] == "POST"){

        //Obteniendo los valores del formulario
         $user = mysqli_real_escape_string($db,$_POST['username']);
         $pass = mysqli_real_escape_string($db,$_POST['password']);
 
        //Codigo y ejucion del SQL query
         $sqlcodgo = "SELECT IDAdmin FROM admin WHERE usuario = '$user' and contra = '$pass'";
         $result = mysqli_query($db,$sqlcodgo);
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
         $active = $row['active'];
 
         $bandera = mysqli_num_rows($result);//Almacenamos el valor de busqueda
         
 
         if($bandera == 1){
             $_SESSION['login_user'] = $user;
             header("location: /../Proyecto WEB/php/Administrador.php");
         }
         else{
             $error = "Usuario o contraseña incorretcots. Intente de nuevo";
             echo $error;
         }
 
     }
    
   }
    
?>
