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
         
         //Codigo y ejucion del SQL query
         $sqlcodgo = "SELECT NoBoleta, Nombre, ApellidoPaterno, ApellidoMaterno, FechaNacimiento, Genero, CURP, CalleYNumero, Colonia, CodigoPostal, TelefonoOCelular, Correo, EscuelaProcedencia, EntidadFederativa, NombreEscuela, Promedio, OpcionEscom FROM registroalumnos WHERE NoBoleta = {$boleta}";
         $result = mysqli_query($db,$sqlcodgo);
         $row = mysqli_fetch_array(($result));
         $bandera = mysqli_num_rows($result);//Almacenamos el valor de filas encontradas
         if($bandera != 1)
         {
             echo "<script>
                 alert('Lo sentimos, no hemos podido encontrar ningún dato con el numero de boleta {$boleta}. Intentelo de nuevo');
                 window.location= '/../Proyecto WEB/eliminar.html'
                 </script>";
         }
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Registro</title>
</head>
<body>
    <h1>Informacion del alumno</h1>

    <form action="/../Proyecto WEB/php/EliminarMySQL.php" method="post">
        <h2>Estas seguro que deseas eliminar el registro</h2>
        <button type="submit">Si</button>
        <button><a href="/../Proyecto WEB/eliminar.html" style="text-decoration: none;">Regresar</a></button><br><br>
        <label for="txtnumero">Numero de boleta:</label>   
        <input type="text" name="txtnumero" id="txtnumero" readonly="readonly" value="<?php echo $row['NoBoleta']; ?>">   
    </form>

        <p>Nombre(s): <?php echo $row['Nombre']; ?></p>
        <p>Apellido Paterno: <?php echo $row['ApellidoPaterno']; ?></p>
        <p>Apellido Materno: <?php echo $row['ApellidoMaterno']; ?></p>
        <p>Fecha de Nacimiento: <?php echo $row['FechaNacimiento']; ?></p>
        <p>Genero: <?php echo $row['Genero']; ?></p>
        <p>CURP: <?php echo $row['CURP']; ?></p>
        <p>Calle y Numero: <?php echo $row['CalleYNumero']; ?></p>
        <p>Colonia: <?php echo $row['Colonia']; ?></p>
        <p>Codigo postal: <?php echo $row['CodigoPostal']; ?></p>
        <p>Telefono o celular: <?php echo $row['TelefonoOCelular']; ?></p>
        <p>Correo: <?php echo $row['Correo']; ?></p>
        <p>Escuela de Procedencia: <?php echo $row['EscuelaProcedencia']; ?></p>
        <p>Entidad Federativa: <?php echo $row['EntidadFederativa']; ?></p>
        <p>Nombre de la Escuela: <?php echo $row['NombreEscuela']; ?></p>
        <p>Promedio: <?php echo $row['Promedio']; ?></p>
        <p>Opcion ESCOM: <?php echo $row['OpcionEscom']; ?></p>
    
</body>
</html>