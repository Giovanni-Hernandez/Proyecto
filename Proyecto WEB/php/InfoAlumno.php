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
   else
   {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $boleta = mysqli_real_escape_string($db,$_POST['txtnumero']);
            $sql = "SELECT NoBoleta, Nombre, ApellidoPaterno, ApellidoMaterno, FechaNacimiento, Genero, CURP, CalleYNumero, Colonia, CodigoPostal, TelefonoOCelular, Correo, EscuelaProcedencia, EntidadFederativa, NombreEscuela, Promedio, OpcionEscom FROM registroalumnos WHERE NoBoleta = {$boleta}";
            $alumno = mysqli_query($db, $sql);
            $datos = mysqli_fetch_array(($alumno));
            $bandera = mysqli_num_rows($alumno);//Almacenamos el valor de filas encontradas
            if($bandera != 1)
            {
                echo "<script>
                    alert('Lo sentimos, no hemos podido encontrar ningún dato con el numero de boleta {$boleta}. Intentelo de nuevo');
                    window.location= '/../Proyecto WEB/buscar.html'
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
    <title>Informacion del Alumno</title>
</head>
<body>
    <a href="/../Proyecto WEB/eliminar.html">Eliminar un registro</a>
    <a href="/../Proyecto WEB/formulario.html">Crear un registro</a>
    <a href="/../Proyecto WEB/actualizar.html">Actualizar registro</a>
    <a href="/../Proyecto WEB/buscar.html">Buscar Alumno</a>
    <a href="/../Proyecto WEB/php/Administrador.php">Regresar al Menu Principal</a>
    <a href="/../Proyecto WEB/php/CerrarSesion.php">Cerrar Sesion</a>

    <h1>Informacion del alumno</h1>
    <p>Numero de boleta</p> <p><?php echo $datos['NoBoleta']; ?></p>
    <p>Nombre(s)</p> <p><?php echo $datos['Nombre']; ?></p>
    <p>Apellido Paterno</p> <p><?php echo $datos['ApellidoPaterno']; ?></p>
    <p>Apellido Materno</p> <p><?php echo $datos['ApellidoMaterno']; ?></p>
    <p>Fecha de Nacimiento</p> <p><?php echo $datos['FechaNacimiento']; ?></p>
    <p>Genero</p> <p><?php echo $datos['Genero']; ?></p>
    <p>CURP</p> <p><?php echo $datos['CURP']; ?></p>
    <p>Calle y Numero</p> <p><?php echo $datos['CalleYNumero']; ?></p>
    <p>Colonia</p> <p><?php echo $datos['Colonia']; ?></p>
    <p>Codigo postal</p> <p><?php echo $datos['CodigoPostal']; ?></p>
    <p>Telefono o celular</p> <p><?php echo $datos['TelefonoOCelular']; ?></p>
    <p>Correo</p> <p><?php echo $datos['Correo']; ?></p>
    <p>Escuela de Procedencia</p> <p><?php echo $datos['EscuelaProcedencia']; ?></p>
    <p>Entidad Federativa</p> <p><td><?php echo $datos['EntidadFederativa']; ?></p>
    <p>Nombre de la Escuela</p> <p><td><?php echo $datos['NombreEscuela']; ?></p>
    <p>Promedio</p> <p><?php echo $datos['Promedio']; ?></p>
    <p>Opcion ESCOM</p> <p><?php echo $datos['OpcionEscom']; ?></p>
 
</body>
</html>