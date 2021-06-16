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
         $boleta1 = mysqli_real_escape_string($db,$_POST['txtnumero']);
         $boleta =  strtoupper($boleta1);

        //Codigo y ejucion del SQL query
        $sqlcodgo = "SELECT NoBoleta, Nombre, ApellidoPaterno, ApellidoMaterno, FechaNacimiento, Genero, CURP, CalleYNumero, Colonia, CodigoPostal, TelefonoOCelular, Correo, EscuelaProcedencia, EntidadFederativa, NombreEscuela, Promedio, OpcionEscom FROM registroalumnos WHERE NoBoleta = '{$boleta}'";
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

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/../Proyecto WEB/css/bootstrap.min.css">

    <!--Hoja de estilos-->
    <link rel="preload" href="/../Proyecto WEB/css/style.css" as="style" />
    <link href="/../Proyecto WEB/css/style.css" rel="stylesheet">

    <!--Font Awesome Iconos-->
    <link href="/../Proyecto WEB/css/all.css" rel="stylesheet">
    <script defer src="/Proyecto WEB/js/all.js"></script>

    <!--Estilo fuente: Roboto-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

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
    <!--Jumbotron-->
    <div class="jumbotron jumbotron-fluid rounded-0 img-jmbo text-center" style="margin-bottom:0">
        <div class="container"><br>
            <h1 id="Bienvenido"><i class="fas fa-pen-alt"></i> Actualizar información del alumno</h1>
            <p>Por favor, actualice los datos del estudiante</p>
            <div class="col text-center mt-4">
                <a href="/../Proyecto WEB/php/Administrador.php" class="btn btn-success mr-3 mb-3" role="button"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                <a href="/../Proyecto WEB/php/CerrarSesion.php" class="btn btn-danger mb-3" role="button">Cerrar Sesión <i class="fas fa-window-close"></i></a>
            </div>
        </div>
    </div>

    <!--Barra de navegacion-->
    <nav class="navbar navbar-expand-md sticky-top rounded-0 navbar-dark bg-primary">
        <a class="navbar-brand font-weight-bold zoom" href="#">
            <img src="/../Proyecto WEB/img/escom-blanco.png" alt="IPN" style="width:40px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#identidad">Identidad</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contacto">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#procedencia">Procedencia</a>
                </li>
            </ul>
        </div>
    </nav>

    <!--Caja de contacto-->
    <div class="contact-box mt-5">
        <div class="container p-6 bg-dark ">
            <div class="user-img">
                <img src="/../Proyecto WEB/img/admin.png" class="img-fluid img-thumbnail rounded-circle mx-auto d-block zoom " alt="ESCOM ">
            </div>
            <!--Formulario-->
            <form action="/../Proyecto WEB/php/ActualizarMySQL.php" method="POST" class="needs-validation" enctype="multipart/form-data" autocomplete="off " onclick="return validacion()" novalidate>

                <fieldset>
                    <legend class="font-weight-bold " id="identidad">Identidad</legend>
                    <div class="row mt-3 ">
                        <div class="col-md-4 ">
                            <label for="boleta">No. de boleta</label>
                            <input type="text" id="boleta" name="boleta" class="form-control bg-dark text-light" readonly="readonly" value="<?php echo $datos['NoBoleta']; ?>">
                        </div>
                        <div class="form-group col-md-8 ">
                            <label for="nombre ">Nombre(s)<span class="text-danger ">*</span></label>
                            <input type="text" id="nombre" name="nombre" size="10" maxlength="20" class="form-control" onkeypress="return soloLetras(event)" value="<?php echo $datos['Nombre']; ?>"required>
                            <div class="valid-feedback ">¡Válido!</div>
                            <div class="invalid-feedback ">Por favor, registre su(s) nombre(s)</div>
                        </div>
                    </div>
                    <div class="row mt-2 ">
                        <div class="form-group col-md-6 ">
                            <label for="apellidop ">Apellido Paterno<span class="text-danger ">*</span></label>
                            <input type="text" id="apellidop" name="apellidop" size="10 " maxlength="15" class="form-control"   onkeypress="return soloLetras(event)" autocomplete="off" value="<?php echo $datos['ApellidoPaterno']; ?>" required>
                            <div class="valid-feedback " id="bolvali">¡Válido!</div>
                            <div class="invalid-feedback " id="bolnovali">Por favor, registre su apellido paterno</div>
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="apellidom ">Apellido Materno<span class="text-danger ">*</span></label>
                            <input type="text" id="apellidom" name="apellidom" size="10 " maxlength="15 " class="form-control"  onkeypress="return soloLetras(event)" autocomplete="off" value="<?php echo $datos['ApellidoMaterno']; ?>" required>
                            <div class="valid-feedback ">¡Válido!</div>
                            <div class="invalid-feedback ">Por favor, registre su apellido materno</div>
                        </div>
                    </div>
                    <div class="row mt-2 ">
                        <div class="form-group col-xl-3 col-md-6 ">
                        <label for="Sexo">G&eacute;nero<span class="text-danger ">*</span></label>
                        <input type="text" name="Sexo" class="form-control" value="<?php echo $datos['Genero']; ?>" required>
                        </div>
                        <div class="form-group col-xl-3 col-md-6 ">
                            <label for="fecha ">Fecha de nacimiento<span class="text-danger ">*</span></label>
                            <input type="date" id="fecha" name="fecha" size="5" class="form-control" value="<?php echo $datos['FechaNacimiento']; ?>" required>
                            <div class="valid-feedback ">¡Válido!</div>
                            <div class="invalid-feedback ">Por favor, registre su fecha de nacimiento</div>
                        </div>
                        <div class="form-group col-xl-6 ">
                            <label for="curp ">CURP<span class="text-danger ">*</span><a href="https://www.gob.mx/curp/" target="_blank"> ¿No conoces tu CURP?</a></label>
                            <input type="text" class="form-control" style="text-transform: uppercase; " id="curp" name="curp" size="18 " maxlength="18 " pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$"
                            value="<?php echo $datos['CURP']; ?>"  autocomplete="off" required >
                            <div class="valid-feedback ">¡Válido!</div>
                            <div class="invalid-feedback ">Proporcione un CURP válido</div>
                        </div>
                    </div>

                    <fieldset class="mt-5 ">
                        <legend class="font-weight-bold " id="contacto">Contacto</legend>
                        <div class="form-group mt-3 ">
                            <label for="calleynum ">Calle y N&uacute;mero<span class="text-danger ">*</span></label>
                            <input type="text" class="form-control" id="calleynum" name="calleynum" size="10 " maxlength="25"  autocomplete="off" value="<?php echo $datos['CalleYNumero']; ?>" required>
                            <div class="valid-feedback ">¡Válido!</div>
                            <div class="invalid-feedback ">Por favor, registre su calle y número</div>
                        </div>
                        <div class="row mt-2 ">
                            <div class="form-group col-md-8 ">
                                <label for="col ">Colonia<span class="text-danger ">*</span></label>
                                <input type="text" class="form-control" id="col" name="col" size="10 " maxlength="20 " onkeypress="return soloLetras(event)" autocomplete="off" value="<?php echo $datos['Colonia']; ?>" required>
                                <div class="valid-feedback ">¡Válido!</div>
                                <div class="invalid-feedback ">Por favor, registre su colonia</div>
                            </div>

                            <div class="form-group col-md-4 ">
                                <label for="postal ">C&oacute;digo Postal<span class="text-danger ">*</span></label>
                                <input type="number" class="form-control" id="postal" name="postal" size="10 " maxlength="5" onkeypress="return soloNumeros(event)" autocomplete="off" value="<?php echo $datos['CodigoPostal']; ?>" required>
                                <div class="valid-feedback ">¡Válido!</div>
                                <div class="invalid-feedback ">Por favor, registre su código postal</div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="form-group col-lg-4 ">
                                <label for="tel ">Tel&eacute;fono o celular<span class="text-danger ">*</span></label>
                                <input type="text" class="form-control " id="tel" name="tel" size="10 " maxlength="12 " onkeypress="return soloNumeros(event)" autocomplete="off" value="<?php echo $datos['TelefonoOCelular']; ?>" required>
                                <div class="valid-feedback ">¡Válido!</div>
                                <div class="invalid-feedback ">Proporcione un teléfono válido</div>
                            </div>
                            <div class="form-group col-lg-8 ">
                                <label for="correo">Correo Electr&oacute;nico<span class="text-danger ">*</span></label>
                                <input type="email" class="form-control " id="correo" name="correo" size="5" maxlength="20 "autocomplete="off" value="<?php echo $datos['Correo']; ?>" required>
                                <div class="valid-feedback ">¡Válido!</div>
                                <div class="invalid-feedback ">Proporcione un correo electrónico válido</div>
                            
                            </div><!--Finaliza el form-group col-lg-8-->
                        </div>
                    </fieldset>

                    <fieldset class="mt-5 ">
                        <legend class="font-weight-bold " id="procedencia">Procedencia</legend>
                        <div class="row mt-3 ">
                            <div class="form-group col-lg-6 ">
                                <label for="escuela ">Escuela de procedencia<span class="text-danger ">*</span></label>
                                <select class="form-control " id="escuela" name="escuela" required onchange="mostrarCampo()">
                                    <option value = "">Selecciona tu escuela de procedencia</option>
                                    <option value="<?php echo $datos['EscuelaProcedencia']; ?>" selected = "selected"><?php echo $datos['EscuelaProcedencia']; ?></option>
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
                                <div class="valid-feedback" id="valEsc">¡Ok!</div>
                                <div class="invalid-feedback" id="valNoEsc">Por favor, seleccione una escuela de procedencia</div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="estado">Entidad federativa de procedencia<span class="text-danger">*</span></label>
                                <select class="form-control" id="estado" name="estado" required> 
                                    <option value = ""> Selecciona tu estado de procedencia</option>
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
                                <div class="valid-feedback" id="valEsta">¡Ok!</div>
                                <div class="invalid-feedback" id="valNoEsta">Por favor, seleccione una entidad federativa de procedencia</div>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="escNombreTxt" style="display:none" id="lblescNombreTxt">Nombre de la escuela<span class="text-danger">*</span></label>
                            <input type="text" style="display:none" class="form-control" id="escNombreTxt" name="escNombreTxt" size="30" maxlength="30" onkeypress="return letrasNumeros(event)" value="<?php echo $datos['NombreEscuela']; ?>"/>
                        </div>
                        <div class="row mt-2">
                            <div class="form-group col-md-5">
                                <label for="escPromedio">Promedio<span class="text-danger">*</span></label>
                                <input type="num" class="form-control" id="escPromedio" name="escPromedio" min="0" max="10" required onchange="promedio()" autocomplete="off" onkeypress="return soloNumeros(event)" value="<?php echo $datos['Promedio']; ?>">
                                <div class="valid-feedback" id="valPro">¡Ok!</div>
                                <div class="invalid-feedback" id="valNoPro">Por favor, registre su promedio</div>
                            </div>

                            <div class="form-group col-md-7">
                                <label for="opcionEscom">ESCOM fue tu<span class="text-danger">*</span></label>
                                <select class="form-control" id="opcionEscom" name="opcionEscom" required>
                                    <option value = ""> Selecciona la opción</option>
                                    <option value="<?php echo $datos['OpcionEscom']; ?>" selected = "selected"><?php echo $datos['OpcionEscom']; ?></option>
                                    <option value = "Primera opcion">Primera opcion</option>
                                    <option value = "Segunda opcion">Segunda opcion</option>
                                    <option value = "Tercera opcion">Tercera opcion</option>
                                    <option value = "Cuarta opcion">Cuarta opcion</option>
                                </select>
                                <div class="valid-feedback" id="valEscom">¡Ok!</div>
                                <div class="invalid-feedback" id="valNoEscom">Por favor, seleccione una opción</div>
                            </div>
                        </div>
                    </fieldset>
                    <input type="submit" class="btn btn-danger btn-lg btn-block mt-4" value="Actualizar" />
            </form>
            <small class="d-inline-block text-muted mt-2">Instituto Politécnico Nacional | Escuela Superior de Cómputo | 2021</small>
        </div>
    </div>
        
    <!--Footer-->
    <div class="container-fluid bg-dark text-center p-3 mt-3">
        <p class="small">&copy;Todos los derechos reservados a la Escuela Superior de Cómputo</p>
    </div>

    <!--Validacion de formulario por JScript-->
    <script language="javascript" type="text/javascript" src="/../Proyecto WEB/js/script1.js"></script>
    <script type="text/javascript" src="/../Proyecto WEB/js/valForm.js"></script>
    <noscript>El navegador no soporta Javascript</noscript>
</body>
</html>
