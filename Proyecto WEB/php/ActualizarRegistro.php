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
        $datos = mysqli_fetch_array(($result));
        $bandera = mysqli_num_rows($result);//Almacenamos el valor de filas encontradas
        if($bandera != 1)
        {
            echo "<script>
                alert('Lo sentimos, no hemos podido encontrar ningún dato con el numero de boleta {$boleta}. Intentelo de nuevo');
                window.location= '/../Proyecto WEB/actualizar.html'
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
    <title>Actualizar Registro</title>
</head>
<script type="text/javascript" src="/../Proyecto WEB/js/validacionForm.js"></script>
<script type="text/javascript" src="/../Proyecto WEB/js/valForm.js"></script>
<script type="text/javascript">
    function mostrarCampo() {
        var escuela = document.getElementById("escuela").value;

        if (escuela == "otro") {
            document.getElementById("escNombreTxt").style.display = "block";
            document.getElementById("lblescNombreTxt").style.display = "block";
        } else {
            document.getElementById("escNombreTxt").style.display = "none";
            document.getElementById("lblescNombreTxt").style.display = "none";
        }

    }

    function soloNumeros(e) {
        var key = e.keyCode || e.which,
            tecla = String.fromCharCode(key).toLowerCase(),
            letras = "0123456789.";

        if (letras.indexOf(tecla) == -1) {
            return false;
        }
    }
</script>
<body>
    <a href="/../Proyecto WEB/php/Administrador.php">Regresar</a>
    <a href="/../Proyecto WEB/php/CerrarSesion.php">Cerrar Sesion</a>
    <h1>Actualizar registro de alumno</h1>
    <form action="/../Proyecto WEB/php/ActualizarMySQL.php" method="POST" enctype="multipart/form-data" onclick="return validacion()">

        <fieldset style="width: 30%;">
            <legend>Identidad</legend>
            <label for="boleta">No. de boleta:</label>
            <input type="text" id="boleta" name="boleta" readonly="readonly" value="<?php echo $datos['NoBoleta']; ?>">
            <br>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" size="10" maxlength="20" onkeypress="return soloLetras(event)" value="<?php echo $datos['Nombre']; ?>"> <br>
            <label for="apellidop">Apellido Paterno</label>
            <input type="text" id="apellidop" name="apellidop" size="10" maxlength="15" onkeypress="return soloLetras(event)" value="<?php echo $datos['ApellidoPaterno']; ?>"> <br>
            <label for="apellidom">Apellido Materno</label>
            <input type="text" id="apellidom" name="apellidom" size="10" maxlength="15" onkeypress="return soloLetras(event)" value="<?php echo $datos['ApellidoMaterno']; ?>"> <br>
            <label for="fecha">Fecha de nacimiento</label>
            <input type="date" id="fecha" name="fecha" size="5" value="<?php echo $datos['FechaNacimiento']; ?>"> <br>
            <label for="Sexo">G&eacute;nero</label>
            <input type="text" name="Sexo" value="<?php echo $datos['Genero']; ?>" >
            <label for="curp">CURP</label>
            <input type="text" style="text-transform: uppercase;" id="curp" name="curp" size="18" maxlength="18" onkeypress="return soloLetras(event)" value="<?php echo $datos['CURP']; ?>"> <br>
        </fieldset><br>

        <fieldset style="width: 60%;">
            <legend>Contacto</legend>
            <label for="calleynum">Calle y N&uacute;mero</label>
            <input type="text" id="calleynum" name="calleynum" size="10" maxlength="25" value="<?php echo $datos['CalleYNumero']; ?>"> <br>
            <label for="col">Colonia</label>
            <input type="text" id="col" name="col" size="10" maxlength="20" onkeypress="return soloLetras(event)" value="<?php echo $datos['Colonia']; ?>"> <br>
            <label for="postal">C&oacute;digo Postal</label>
            <input type="number" id="postal" name="postal" size="10" maxlength="5" value="<?php echo $datos['CodigoPostal']; ?>"> <br>
            <label for="tel">Tel&eacute;fono o celular</label>
            <input type="number" id="tel" name="tel" size="10" maxlength="12" value="<?php echo $datos['TelefonoOCelular']; ?>"> <br>
            <label for="correo">Correo Electr&oacute;nico</label>
            <input type="text" id="correo" name="correo" size="10" maxlength="20" value="<?php echo $datos['Correo']; ?>">
            


        </fieldset><br>

        <fieldset style="width: 30%;">
            <legend>Procedencia</legend>
            <label for="escuela"> Escuela de procedencia: </label>
            <select id="escuela" name="escuela" onchange="mostrarCampo()">
                <option value = "escSel" selected = "selected"> <?php echo $datos['EscuelaProcedencia']; ?></option>
                <option value = "CECyT 1 “Gonzalez Vazquez Vega“">CECyT 1 “Gonzalez Vazquez Vega"</option>
                <option value = "CECyT 2 “Miguel Bernard“">CECyT 2 "Miguel Bernard"</option>
                <option value = "CECyT 3 “Estanislao Ramirez Ruiz“">CECyT 3 "Estanislao Ramirez Ruiz"</option>
                <option value = "CECyT 4 “Lazaro Cardenas“">CECyT 4 "Lazaro Cardenas"</option>
                <option value = "CECyT 5 “Benito Juarez Garcia“">CECyT 5 "Benito Juarez Garcia"</option>
                <option value = "CECyT 6 “Miguel Othon de Mendizabal“">CECyT 6 "Miguel Othon de Mendizabal"</option>
                <option value = "CECyT 7 “Cuauhtemoc“">CECyT 7 "Cuauhtemoc"</option>
                <option value = "CECyT 8 “Narciso Bassols Garcia“">CECyT 8 "Narciso Bassols Garcia"</option>
                <option value = "CECyT 9 “Juan de Dios Batiz“">CECyT 9 "Juan de Dios Batiz"</option>
                <option value = "CECyT 10 “Carlos Vallejo Marquez“">CECyT 10 "Carlos Vallejo Marquez"</option>
                <option value = "CECyT 11 “Wilfrido Massieu Perez“">CECyT 11 "Wilfrido Massieu Perez"</option>
                <option value = "CECyT 12 “Jose Maria Morelos y Pavon“">CECyT 12 "Jose Maria Morelos y Pavon"</option>
                <option value = "CECyT 13 “Ricardo Flores Magon“">CECyT 13 "Ricardo Flores Magon"</option>
                <option value = "CECyT 14 “Luis Enrique Erro“">CECyT 14 "Luis Enrique Erro"</option>
                <option value = "CECyT 15 “Diodoro Antunez Echegaray“">CECyT 15 "Diodoro Antunez Echegaray"</option>
                <option value = "CECyT 16 “Hidalgo”">CECyT 16 “Hidalgo”</option>
                <option value = "CECyT 17 “Leon, Guanajuato“">CECyT 17 "Leon, Guanajuato"</option>
                <option value = "CECyT 18 “Zacatecas“">CECyT 18 "Zacatecas"</option>
                <option value = "CECyT 19 “Leona Vicario”">CECyT 19 “Leona Vicario”</option>
                <option value = "CET 1 “Walter Cross Buchanan”">CET 1 “Walter Cross Buchanan”</option>
                <option value = "otro">Otro</option>
            </select>
            <br>

            <label for="escNombreTxt" style="display:none" id="lblescNombreTxt"> Nombre de la escuela: </label>
            <input type="text" id="escNombreTxt" name="escNombreTxt" size="30" maxlength="30" onkeypress="return soloLetras(event)" style="display:none" value="<?php echo $datos['NombreEscuela']; ?>"/>

            <label for="escPromedio">Promedio de la escuela:</label>
            <input type="text" id="escPromedio" name="escPromedio" min="0" max="10" onkeypress="return soloNumeros(event)" value="<?php echo $datos['Promedio']; ?>">
            <br>

            <label for="estado"> Entidad federativa de procedencia: </label>
            <select id="estado" name="estado" >
                <option value = "estSel" > Selecciona tu estado de procedencia</option>
                <option value="<?php echo $datos['EntidadFederativa']; ?>" selected = "selected"><?php echo $datos['EntidadFederativa']; ?></option>
                <option value = "Aguascalientes">Aguascalientes</option>
                <option value = "Baja California">Baja California</option>
                <option value = "Baja California Sur">Baja California Sur</option>
                <option value = "Campeche">Campeche</option>
                <option value = "Chiapas">Chiapas</option>
                <option value = "Chihuahua">Chihuahua</option>
                <option value = "Ciudad de Mexico">Ciudad de Mexico</option>
                <option value = "Coahuila">Coahuila</option>
                <option value = "Colima">Colima</option>
                <option value = "Durango">Durango</option>
                <option value = "Estado de Mexico">Estado de Mexico</option>
                <option value = "Guanajuato">Guanajuato</option>
                <option value = "Guerrero">Guerrero</option>
                <option value = "Hidalgo">Hidalgo</option>
                <option value = "Jalisco">Jalisco</option>
                <option value = "Michoacan">Michoacan</option>
                <option value = "Morelos">Morelos</option>
                <option value = "Nayarit">Nayarit</option>
                <option value = "Nuevo Leon">Nuevo Leon</option>
                <option value = "Oaxaca">Oaxaca</option>
                <option value = "Puebla">Puebla</option>
                <option value = "Queretaro">Queretaro</option>
                <option value = "Quintana Roo">Quintana Roo</option>
                <option value = "San Luis Potosi">San Luis Potosi</option>
                <option value = "Sinaloa">Sinaloa</option>
                <option value = "Sonora">Sonora</option>
                <option value = "Tabasco">Tabasco</option>
                <option value = "Tamaulipas">Tamaulipas</option>
                <option value = "Tlaxcala">Tlaxcala</option>
                <option value = "Veracruz">Veracruz</option>
                <option value = "Yucatan">Yucatan</option>
                <option value = "Zacatecas">Zacatecas</option>
            </select>
            <br>
            <label for="opcionEscom"> ESCOM fue tu: </label>
            <select id="opcionEscom" name="opcionEscom" value="<?php echo $datos['FechaNacimiento']; ?>">
                <option value = "estSel"> Selecciona la opción</option>
                <option value="<?php echo $datos['OpcionEscom']; ?>" selected = "selected"><?php echo $datos['OpcionEscom']; ?></option>
                <option value = "Primera opción">Primera opción</option>
                <option value = "Segunda opción">Segunda opción</option>
                <option value = "Tercera opción">Tercera opción</option>
                <option value = "Cuarta opción">Cuarta opción</option>
            </select>
        </fieldset><br>

        <input type="submit" value="enviar">

    </form>
    <script type="text/javascript" src="/../Proyecto WEB/js/valForm.js"></script>
</body>
</html>
