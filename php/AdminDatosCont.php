<?php
    //Incluyendo Conexion a la base de datos
    include("Config.php");
    session_start();
    if (!isset($_SESSION['login_user'])) {
        header("Location: /../Proyecto WEB/login.html");
        die();
    }

    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    //Codigo de PHP para mostrar infomacion
    $sql = "SELECT * FROM registroalumnos";
    $result = mysqli_query($db, $sql);
    $datos = mysqli_fetch_array(($result));
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administrador</title>
    </head>
    <body>
    <h1>Bienvenido a la pagina del administrador</h1>

    <a href="/../Proyecto WEB/eliminar.html">Eliminar un registro</a>
    <a href="/../Proyecto WEB/formulario.html">Crear un registro</a>
    <a href="/../Proyecto WEB/actualizar.html">Actualizar registro</a>
    <a href="/../Proyecto WEB/buscar.html">Buscar Alumno</a>
    <a href="/../Proyecto WEB/php/CerrarSesion.php">Cerrar Sesion</a>
    <br><br>
    
    <div id="menu">
        <p>Mostrar por:
        <a href="/../Proyecto WEB/php/Administrador.php">Datos Personales</a>
        <a href="/../Proyecto WEB/php/AdminDatosCont.php">Contacto</a>
        <a href="/../Proyecto WEB/php/AdminDatosProce.php">Procedencia</a> <br> 
        </p>
    </div>

    <table border="1">
        <tr>
            <td>Numero de Boleta</td>
            <td>Nombre(s)</td>
            <td>Apellio Paterno</td>
            <td>Apelido Materno</td>
            <td>Calle Y Numero</td>
            <td>Colonia</td>
            <td>Codgio Postal</td>
            <td>Telefono o Celular</td>
            <td>Correo</td>
            
        </tr>

        <?php
            //Lenando la tabla con cada uno de los valores que encuentre en la base
            foreach($result as $row){?>
                <tr>
                    <td><?php echo $row['NoBoleta']; ?></td>
                    <td><?php echo $row['Nombre']; ?></td>
                    <td><?php echo $row['ApellidoPaterno']; ?></td>
                    <td><?php echo $row['ApellidoMaterno']; ?></td>
                    <td><?php echo $row['CalleYNumero']; ?></td>
                    <td><?php echo $row['Colonia']; ?></td>
                    <td><?php echo $row['CodigoPostal']; ?></td>
                    <td><?php echo $row['TelefonoOCelular']; ?></td>
                    <td><?php echo $row['Correo']; ?></td>
                    
                </tr>
            <?php } ?>
    </table>
    </body>
</html>
