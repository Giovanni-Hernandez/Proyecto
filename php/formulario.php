<?php

    session_start();

    if(!isset($_SESSION['modificacion'])){

        $_SESSION["boleta"] = "";
        $_SESSION["nombre"] = "";
        $_SESSION["apellidop"] = "";
        $_SESSION["apellidom"] = "";
        $_SESSION["fecha"] = "";
        $_SESSION["curp"] = "";
        $_SESSION["Sexo"] = "";
        $_SESSION["calleynum"] = "";
        $_SESSION["col"] = "";
        $_SESSION["postal"] = "16720";
        $_SESSION["tel"] = "";
        $_SESSION["correo"] = "";
        $_SESSION["dircor"] = "@gmail.com";
        $_SESSION["escuela"] = "Selecciona tu escuela de procedencia";
        $_SESSION["estado"] = "Selecciona tu estado de procedencia";
        $_SESSION["escNombreTxt"] = "";
        $_SESSION["escPromedio"] = "";
        $_SESSION["opcionEscom"] = "Selecciona la opción";

        $_SESSION['id'] = session_id();
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sp" lang="sp">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

    <title>Formulario</title>
</head>

<!--Links y funciones extra de JS-->
<script type="text/javascript" src="/../Proyecto WEB/js/valForm.js"></script>
<script type="text/javascript" src="/../Proyecto WEB/js/validacionForm.js"></script>
<script type="text/javascript">
    function mostrarCampo() {
        var escuela = document.getElementById("escuela").value;

        if (escuela == "Otro") {
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
            letras = "0123456789";

        if (letras.indexOf(tecla) == -1) {
            return false;
        }
    }
</script>

<body>

    <!--Jumbotron-->
    <div class="jumbotron jumbotron-fluid rounded-0 img-jmbo" style="margin-bottom:0">
        <div class="container console-container mt-2">
            <span id='text1'></span>
            <div class='console-underscore' id='console'>&#95;</div>
        </div>
        <div class="col text-center mt-4">
            <a href="/../Proyecto WEB/index.html" class="btn btn-success mr-3 mb-3" role="button"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
            <a href="/../Proyecto WEB/recuperar.html" class="btn btn-danger mb-3" role="button">Recuperar PDF <i class="fas fa-file-pdf"></i></a>
        </div>
    </div>

    <!--Barra de navegacion-->
    <nav class="navbar navbar-expand-md sticky-top rounded-0 navbar-dark bg-primary">
        <a class="navbar-brand font-weight-bold zoom" href="#">
            <img src="/../Proyecto WEB/img/escudoESCOM.png" alt="IPN" style="width:40px;">
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

    <!--Escudos-->
    <div class="container p-4 bg-dark mb-5 mt-5 roundend-0">
        <div class="row">
            <div class="col-md-3 escom-img">
                <img src="/../Proyecto WEB/img/escudoESCOM.png" width="180" height="150" class="img-responsive mx-auto d-block zoom centrar-img" alt="ESCOM ">
            </div>
            <div class="col-md-6 ">
                </br>
                <h2 class="text-center resize1 ">Instituto Politécnico Nacional</h2>
                <h3 class="text-center resize2 ">Escuela Superior de Cómputo</h3>
            </div>
            <div class="col-md-3 ipn-img ">
                <img src="/../Proyecto WEB/img/ipn.png" width="150 " height="180 " class="img-responsive mx-auto d-block zoom centrar-img " alt="IPN ">
            </div>
        </div>
    </div>

    <!--Caja de contacto-->
    <div class="contact-box ">
        <div class="container p-6 bg-dark ">
            <div class="user-img">
                <img src="/../Proyecto WEB/img/estudiante.png" class="img-fluid img-thumbnail rounded-circle mx-auto d-block zoom " alt="ESCOM ">
            </div>
            <!--Formulario-->
            <form action="/../Proyecto WEB/php/verificar.php" method="POST" enctype="multipart/form-data" class="needs-validation" autocomplete="off " novalidate onsubmit="return validacion()">

                <fieldset>
                    <legend class="font-weight-bold " id="identidad">Identidad</legend>
                    <div class="row mt-3 ">
                        <div class="form-group col-md-4 ">
                            <label for="boleta ">No. de boleta<span class="text-danger ">*</span></label>
                            <input <?php echo 'value = "'.$_SESSION['boleta'].'"'; ?> type="text" id="boleta" name="boleta" size="10" maxlength="10" class="form-control " placeholder="Boleta " required onkeypress="return valiBoleta(event)" style="text-transform: uppercase;" onchange="numBoleta()" autocomplete="off">
                            <div class="valid-feedback " id="bolvali">¡Válido!</div>
                            <div class="invalid-feedback " id="bolnovali">Proporcione un no. de boleta válido</div>
                        </div>
                        <div class="form-group col-md-8 ">
                            <label for="nombre ">Nombre(s)<span class="text-danger ">*</span></label>
                            <input <?php echo 'value = "'.$_SESSION["nombre"].'"'; ?> type="text" id="nombre" name="nombre" size="10" maxlength="20 " placeholder="Ingrese el nombre" class="form-control " required onkeypress="return soloLetras(event)" autocomplete="off">
                            <div class="valid-feedback ">¡Válido!</div>
                            <div class="invalid-feedback ">Por favor, registre su(s) nombre(s)</div>
                        </div>
                    </div>
                    <div class="row mt-2 ">
                        <div class="form-group col-md-6 ">
                            <label for="apellidop ">Apellido Paterno<span class="text-danger ">*</span></label>
                            <input <?php echo 'value = "'.$_SESSION['apellidop'].'"'; ?> type="text" id="apellidop" name="apellidop" size="10 " maxlength="15 " class="form-control " placeholder="Ingrese Apellido Paterno " required onkeypress="return soloLetras(event)" autocomplete="off">
                            <div class="valid-feedback " id="bolvali">¡Válido!</div>
                            <div class="invalid-feedback " id="bolnovali">Por favor, registre su apellido paterno</div>
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="apellidom ">Apellido Materno<span class="text-danger ">*</span></label>
                            <input <?php echo 'value = "'.$_SESSION['apellidom'].'"'; ?> type="text" id="apellidom" name="apellidom" size="10 " maxlength="15 " placeholder="Ingrese Apellido Materno " class="form-control " required onkeypress="return soloLetras(event)" autocomplete="off">
                            <div class="valid-feedback ">¡Válido!</div>
                            <div class="invalid-feedback ">Por favor, registre su apellido materno</div>
                        </div>
                    </div>
                    <div class="row mt-2 ">
                        <div class="form-group col-xl-3 col-md-6 ">
                            <label class="mb-3 ">G&eacute;nero<span class="text-danger ">*</span></label>
                            <div class="custom-control custom-radio ">
                                <input <?php if($_SESSION['Sexo'] == 'MASCULINO'){ echo 'checked = "checked"';} ?> type="radio" class="custom-control-input " name="Sexo" id="radio1 " value="MASCULINO" required checked="">
                                <label class="custom-control-label " for="radio1 ">Masculino</label>
                            </div>
                            <div class="custom-control custom-radio ">
                                <input <?php if($_SESSION['Sexo'] == 'FEMENINO'){ echo 'checked = "checked"';} ?> type="radio" class="custom-control-input " name="Sexo" id="radio2 " value="FEMENINO" required>
                                <label class="custom-control-label " for="radio2 ">Femenino</label>
                            </div>
                            <div class="valid-feedback ">¡Válido!</div>
                            <div class="invalid-feedback ">Por favor, registre su género</div>
                        </div>
                        <div class="form-group col-xl-3 col-md-6 ">
                            <label for="fecha ">Fecha de nacimiento<span class="text-danger ">*</span></label>
                            <input <?php echo 'value = "'.$_SESSION['fecha'].'"'; ?> type="date" id="fecha" name="fecha" size="5" class="form-control " required>
                            <div class="valid-feedback ">¡Válido!</div>
                            <div class="invalid-feedback ">Por favor, registre su fecha de nacimiento</div>
                        </div>
                        <div class="form-group col-xl-6 ">
                            <label for="curp ">CURP<span class="text-danger ">*</span><a href="https://www.gob.mx/curp/" target="_blank"> ¿No conoces tu CURP?</a></label>
                            <input <?php echo 'value = "'.$_SESSION['curp'].'"'; ?> type="text" class="form-control " style="text-transform: uppercase; " id="curp" name="curp" size="18 " maxlength="18 " pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$"
                                required autocomplete="off">
                            <div class="valid-feedback ">¡Válido!</div>
                            <div class="invalid-feedback ">Proporcione un CURP válido</div>
                        </div>
                    </div>

                    <fieldset class="mt-5 ">
                        <legend class="font-weight-bold " id="contacto">Contacto</legend>
                        <div class="form-group mt-3 ">
                            <label for="calleynum ">Calle y N&uacute;mero<span class="text-danger ">*</span></label>
                            <input <?php echo 'value = "'.$_SESSION['calleynum'].'"'; ?> type="text" class="form-control " id="calleynum" name="calleynum" size="10 " maxlength="25" required onkeypress="return letrasNumeros(event)" autocomplete="off">
                            <div class="valid-feedback ">¡Válido!</div>
                            <div class="invalid-feedback ">Por favor, registre su calle y número</div>
                        </div>
                        <div class="row mt-2 ">
                            <div class="form-group col-md-8 ">
                                <label for="col ">Colonia<span class="text-danger ">*</span></label>
                                <input <?php echo 'value = "'.$_SESSION['col'].'"'; ?> type="text" class="form-control " id="col" name="col" size="10 " maxlength="20 " required onkeypress="return soloLetras(event)" autocomplete="off">
                                <div class="valid-feedback ">¡Válido!</div>
                                <div class="invalid-feedback ">Por favor, registre su colonia</div>
                            </div>

                            <div class="form-group col-md-4 ">
                                <label for="postal ">C&oacute;digo Postal<span class="text-danger ">*</span></label>
                                <input <?php echo 'value = "'.$_SESSION['postal'].'"'; ?> type="text" class="form-control " id="postal" name="postal" size="10 " maxlength="5" required onkeypress="return soloNumeros(event)" autocomplete="off">
                                <div class="valid-feedback ">¡Válido!</div>
                                <div class="invalid-feedback ">Por favor, registre su código postal</div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="form-group col-lg-4 ">
                                <label for="tel ">Tel&eacute;fono o celular<span class="text-danger ">*</span></label>
                                <input <?php echo 'value = "'.$_SESSION['tel'].'"'; ?> type="text" class="form-control " id="tel" name="tel" size="10 " maxlength="12 " required onkeypress="return soloNumeros(event)" autocomplete="off">
                                <div class="valid-feedback ">¡Válido!</div>
                                <div class="invalid-feedback ">Proporcione un teléfono válido</div>
                            </div>
                            <div class="form-group col-lg-8 ">
                                <label for="correo">Correo Electr&oacute;nico<span class="text-danger ">*</span></label>
                                <div class="input-group ">
                                    <input <?php echo 'value = "'.$_SESSION['correo'].'"'; ?> type="text " class="form-control " id="correo" name="correo" size="5" maxlength="20 " aria-describedby= "dircor" required autocomplete="off">
                                    <div class="input-group-append">  
                                        <select id="dircor"  name="dircor" class="form-control input-group-text">
                                            
                                            <option <?php if($_SESSION['dircor'] == "@gmail.com"){ echo 'selected';} ?> value="@gmail.com">@gmail.com</option>
                                            <option <?php if($_SESSION['dircor'] == "@hotmail.com"){ echo 'selected';} ?> value="@hotmail.com">@hotmail.com</option>
                                            <option <?php if($_SESSION['dircor'] == "@outlook.com"){ echo 'selected';} ?> value="@outlook.com">@outlook.com</option>
                                            <option <?php if($_SESSION['dircor'] == "@outlook.com.es"){ echo 'selected';} ?> value="@outlook.com.es">@outlook.com.es</option>
                                            <option <?php if($_SESSION['dircor'] == "@adinet.com.uy"){ echo 'selected';} ?> value="@adinet.com.uy">@adinet.com.uy</option>
                                            <option <?php if($_SESSION['dircor'] == "@vera.com.uy"){ echo 'selected';} ?> value="@vera.com.uy">@vera.com.uy</option>

                                        </select>
                                    </div>
                                    <div class="valid-feedback ">¡Válido!</div>
                                    <div class="invalid-feedback ">Proporcione un correo electrónico válido</div>
                                </div> <!--Finaliza el input-group-->
                            </div><!--Finaliza el form-group col-lg-8-->
                        </div>
                    </fieldset>

                    <fieldset class="mt-5 ">
                        <legend class="font-weight-bold " id="procedencia">Procedencia</legend>
                        <div class="row mt-3 ">
                            <div class="form-group col-lg-6 ">
                                <label for="escuela ">Escuela de procedencia<span class="text-danger ">*</span></label>
                                <select class="form-control " id="escuela" name="escuela" required onchange="mostrarCampo()">
                                    <option <?php if($_SESSION['escuela'] == "Selecciona tu escuela de procedencia"){ echo 'selected';} ?> value = "Selecciona tu escuela de procedencia">Selecciona tu escuela de procedencia</option>
                                    <option <?php if($_SESSION['escuela'] == "CECyT 1 “Gonzalez Vazquez Vega“"){ echo 'selected';} ?> value = "CECyT 1 “Gonzalez Vazquez Vega“">CECyT 1 “Gonzalez Vazquez Vega"</option>
                                    <option <?php if($_SESSION['escuela'] == "CECyT 2 “Miguel Bernard“"){ echo 'selected';} ?> value = "CECyT 2 “Miguel Bernard“">CECyT 2 "Miguel Bernard"</option>
                                    <option <?php if($_SESSION['escuela'] == "CECyT 3 “Estanislao Ramirez Ruiz“"){ echo 'selected';} ?> value = "CECyT 3 “Estanislao Ramirez Ruiz“">CECyT 3 "Estanislao Ramirez Ruiz"</option>
                                    <option <?php if($_SESSION['escuela'] == "CECyT 4 “Lazaro Cardenas“"){ echo 'selected';} ?> value = "CECyT 4 “Lazaro Cardenas“">CECyT 4 "Lazaro Cardenas"</option>
                                    <option <?php if($_SESSION['escuela'] == "CECyT 5 “Benito Juarez Garcia“"){ echo 'selected';} ?> value = "CECyT 5 “Benito Juarez Garcia“">CECyT 5 "Benito Juarez Garcia"</option>
                                    <option <?php if($_SESSION['escuela'] == "CECyT 6 “Miguel Othon de Mendizabal“"){ echo 'selected';} ?> value = "CECyT 6 “Miguel Othon de Mendizabal“">CECyT 6 "Miguel Othon de Mendizabal"</option>
                                    <option <?php if($_SESSION['escuela'] == "CECyT 7 “Cuauhtemoc“"){ echo 'selected';} ?> value = "CECyT 7 “Cuauhtemoc“">CECyT 7 "Cuauhtemoc"</option>
                                    <option <?php if($_SESSION['escuela'] == "CECyT 8 “Narciso Bassols Garcia“"){ echo 'selected';} ?> value = "CECyT 8 “Narciso Bassols Garcia“">CECyT 8 "Narciso Bassols Garcia"</option>
                                    <option <?php if($_SESSION['escuela'] == "CECyT 9 “Juan de Dios Batiz“"){ echo 'selected';} ?> value = "CECyT 9 “Juan de Dios Batiz“">CECyT 9 "Juan de Dios Batiz"</option>
                                    <option <?php if($_SESSION['escuela'] == "CECyT 10 “Carlos Vallejo Marquez“"){ echo 'selected';} ?> value = "CECyT 10 “Carlos Vallejo Marquez“">CECyT 10 "Carlos Vallejo Marquez"</option>
                                    <option <?php if($_SESSION['escuela'] == "CECyT 11 “Wilfrido Massieu Perez“"){ echo 'selected';} ?> value = "CECyT 11 “Wilfrido Massieu Perez“">CECyT 11 "Wilfrido Massieu Perez"</option>
                                    <option <?php if($_SESSION['escuela'] == "CECyT 12 “Jose Maria Morelos y Pavon“"){ echo 'selected';} ?> value = "CECyT 12 “Jose Maria Morelos y Pavon“">CECyT 12 "Jose Maria Morelos y Pavon"</option>
                                    <option <?php if($_SESSION['escuela'] == "CECyT 13 “Ricardo Flores Magon“"){ echo 'selected';} ?> value = "CECyT 13 “Ricardo Flores Magon“">CECyT 13 "Ricardo Flores Magon"</option>
                                    <option <?php if($_SESSION['escuela'] == "CECyT 14 “Luis Enrique Erro“"){ echo 'selected';} ?> value = "CECyT 14 “Luis Enrique Erro“">CECyT 14 "Luis Enrique Erro"</option>
                                    <option <?php if($_SESSION['escuela'] == "CECyT 15 “Diodoro Antunez Echegaray“"){ echo 'selected';} ?> value = "CECyT 15 “Diodoro Antunez Echegaray“">CECyT 15 "Diodoro Antunez Echegaray"</option>
                                    <option <?php if($_SESSION['escuela'] == "CECyT 16 “Hidalgo”"){ echo 'selected';} ?> value = "CECyT 16 “Hidalgo”">CECyT 16 “Hidalgo”</option>
                                    <option <?php if($_SESSION['escuela'] == "CECyT 17 “Leon, Guanajuato“"){ echo 'selected';} ?> value = "CECyT 17 “Leon, Guanajuato“">CECyT 17 "Leon, Guanajuato"</option>
                                    <option <?php if($_SESSION['escuela'] == "CECyT 18 “Zacatecas“"){ echo 'selected';} ?> value = "CECyT 18 “Zacatecas“">CECyT 18 "Zacatecas"</option>
                                    <option <?php if($_SESSION['escuela'] == "CECyT 19 “Leona Vicario”"){ echo 'selected';} ?> value = "CECyT 19 “Leona Vicario”">CECyT 19 “Leona Vicario”</option>
                                    <option <?php if($_SESSION['escuela'] == "CET 1 “Walter Cross Buchanan”"){ echo 'selected';} ?> value = "CET 1 “Walter Cross Buchanan”">CET 1 “Walter Cross Buchanan”</option>
                                    <option <?php if($_SESSION['escuela'] == "Otro"){ echo 'selected';} ?> value = "Otro">Otro</option>
                                </select>
                                <div class="valid-feedback" id="valEsc">¡Ok!</div>
                                <div class="invalid-feedback" id="valNoEsc">Por favor, seleccione una escuela de procedencia</div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="estado">Entidad federativa de procedencia<span class="text-danger">*</span></label>
                                <select class="form-control" id="estado" name="estado" required> 
                                    <option <?php if($_SESSION['estado'] == "Selecciona tu estado de procedencia"){ echo 'selected';} ?> value = "Selecciona tu estado de procedencia"> Selecciona tu estado de procedencia</option>
                                    <option <?php if($_SESSION['estado'] == "Aguascalientes"){ echo 'selected';} ?> value = "Aguascalientes">Aguascalientes</option>
                                    <option <?php if($_SESSION['estado'] == "Baja California"){ echo 'selected';} ?> value = "Baja California">Baja California</option>
                                    <option <?php if($_SESSION['estado'] == "Baja California Sur"){ echo 'selected';} ?> value = "Baja California Sur">Baja California Sur</option>
                                    <option <?php if($_SESSION['estado'] == "Campeche"){ echo 'selected';} ?> value = "Campeche">Campeche</option>
                                    <option <?php if($_SESSION['estado'] == "Chiapas"){ echo 'selected';} ?> value = "Chiapas">Chiapas</option>
                                    <option <?php if($_SESSION['estado'] == "Chihuahua"){ echo 'selected';} ?> value = "Chihuahua">Chihuahua</option>
                                    <option <?php if($_SESSION['estado'] == "Ciudad de Mexico"){ echo 'selected';} ?> value = "Ciudad de Mexico">Ciudad de Mexico</option>
                                    <option <?php if($_SESSION['estado'] == "Coahuila"){ echo 'selected';} ?> value = "Coahuila">Coahuila</option>
                                    <option <?php if($_SESSION['estado'] == "Colima"){ echo 'selected';} ?> value = "Colima">Colima</option>
                                    <option <?php if($_SESSION['estado'] == "Durango"){ echo 'selected';} ?> value = "Durango">Durango</option>
                                    <option <?php if($_SESSION['estado'] == "Estado de Mexico"){ echo 'selected';} ?> value = "Estado de Mexico">Estado de Mexico</option>
                                    <option <?php if($_SESSION['estado'] == "Guanajuato"){ echo 'selected';} ?> value = "Guanajuato">Guanajuato</option>
                                    <option <?php if($_SESSION['estado'] == "Guerrero"){ echo 'selected';} ?> value = "Guerrero">Guerrero</option>
                                    <option <?php if($_SESSION['estado'] == "Hidalgo"){ echo 'selected';} ?> value = "Hidalgo">Hidalgo</option>
                                    <option <?php if($_SESSION['estado'] == "Jalisco"){ echo 'selected';} ?> value = "Jalisco">Jalisco</option>
                                    <option <?php if($_SESSION['estado'] == "Michoacan"){ echo 'selected';} ?> value = "Michoacan">Michoacan</option>
                                    <option <?php if($_SESSION['estado'] == "Morelos"){ echo 'selected';} ?> value = "Morelos">Morelos</option>
                                    <option <?php if($_SESSION['estado'] == "Nayarit"){ echo 'selected';} ?> value = "Nayarit">Nayarit</option>
                                    <option <?php if($_SESSION['estado'] == "Nuevo Leon"){ echo 'selected';} ?> value = "Nuevo Leon">Nuevo Leon</option>
                                    <option <?php if($_SESSION['estado'] == "Oaxaca"){ echo 'selected';} ?> value = "Oaxaca">Oaxaca</option>
                                    <option <?php if($_SESSION['estado'] == "Puebla"){ echo 'selected';} ?> value = "Puebla">Puebla</option>
                                    <option <?php if($_SESSION['estado'] == "Queretaro"){ echo 'selected';} ?> value = "Queretaro">Queretaro</option>
                                    <option <?php if($_SESSION['estado'] == "Quintana Roo"){ echo 'selected';} ?> value = "Quintana Roo">Quintana Roo</option>
                                    <option <?php if($_SESSION['estado'] == "San Luis Potosi"){ echo 'selected';} ?> value = "San Luis Potosi">San Luis Potosi</option>
                                    <option <?php if($_SESSION['estado'] == "Sinaloa"){ echo 'selected';} ?> value = "Sinaloa">Sinaloa</option>
                                    <option <?php if($_SESSION['estado'] == "Sonora"){ echo 'selected';} ?> value = "Sonora">Sonora</option>
                                    <option <?php if($_SESSION['estado'] == "Tabasco"){ echo 'selected';} ?> value = "Tabasco">Tabasco</option>
                                    <option <?php if($_SESSION['estado'] == "Tamaulipas"){ echo 'selected';} ?> value = "Tamaulipas">Tamaulipas</option>
                                    <option <?php if($_SESSION['estado'] == "Tlaxcala"){ echo 'selected';} ?> value = "Tlaxcala">Tlaxcala</option>
                                    <option <?php if($_SESSION['estado'] == "Veracruz"){ echo 'selected';} ?> value = "Veracruz">Veracruz</option>
                                    <option <?php if($_SESSION['estado'] == "Yucatan"){ echo 'selected';} ?> value = "Yucatan">Yucatan</option>
                                    <option <?php if($_SESSION['estado'] == "Zacatecas"){ echo 'selected';} ?> value = "Zacatecas">Zacatecas</option>
                                    <option <?php if($_SESSION['estado'] == "Extranjero"){ echo 'selected';} ?> value = "Extranjero">Extranjero</option>
                                </select>
                                <div class="valid-feedback" id="valEsta">¡Ok!</div>
                                <div class="invalid-feedback" id="valNoEsta">Por favor, seleccione una entidad federativa de procedencia</div>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="escNombreTxt" style="display:none" id="lblescNombreTxt">Nombre de la escuela<span class="text-danger">*</span></label>
                            <input <?php echo 'value = "'.$_SESSION['escNombreTxt'].'"'; ?> type="text" style="display:none" class="form-control" id="escNombreTxt" name="escNombreTxt" size="30" maxlength="30" onkeypress="return letrasNumeros(event)" />
                        </div>
                        <div class="row mt-2">
                            <div class="form-group col-md-5">
                                <label for="escPromedio">Promedio<span class="text-danger">*</span></label>
                                <input <?php echo 'value = "'.$_SESSION['escPromedio'].'"'; ?> type="num" class="form-control" id="escPromedio" name="escPromedio" min="0" max="10" required onchange="promedio()" autocomplete="off">
                                <div class="valid-feedback" id="valPro">¡Ok!</div>
                                <div class="invalid-feedback" id="valNoPro">Por favor, registre su promedio</div>
                            </div>

                            <div class="form-group col-md-7">
                                <label for="opcionEscom">ESCOM fue tu<span class="text-danger">*</span></label>
                                <select <?php echo 'value = "'.$_SESSION['opcionEscom'].'"'; ?> class="form-control" id="opcionEscom" name="opcionEscom" required>
                                    <option <?php if($_SESSION['opcionEscom'] == "Selecciona la opción"){ echo 'selected';} ?> value = "Selecciona la opción">Selecciona la opción</option>
                                    <option <?php if($_SESSION['opcionEscom'] == "Primera opcion"){ echo 'selected';} ?> value = "Primera opcion">Primera opción</option>
                                    <option <?php if($_SESSION['opcionEscom'] == "Segunda opcion"){ echo 'selected';} ?> value = "Segunda opcion">Segunda opción</option>
                                    <option <?php if($_SESSION['opcionEscom'] == "Tercera opcion"){ echo 'selected';} ?> value = "Tercera opcion">Tercera opción</option>
                                    <option <?php if($_SESSION['opcionEscom'] == "Cuarta opcion"){ echo 'selected';} ?> value = "Cuarta opcion">Cuarta opción</option>
                                </select>
                                <div class="valid-feedback" id="valEscom">¡Ok!</div>
                                <div class="invalid-feedback" id="valNoEscom">Por favor, seleccione una opción</div>
                            </div>
                        </div>
                    </fieldset>
                    <input type="reset" class="btn btn-outline-light btn-lg mt-4" value="Limpiar" />
                    <input type="submit" class="btn btn-primary btn-lg btn-block mt-4" value="Continuar" />
            </form>
            <small class="d-inline-block text-muted mt-2">Instituto Politécnico Nacional | Escuela Superior de Cómputo | 2021</small>
        </div>
    </div>

    <!--Footer-->
    <div class="container-fluid bg-dark text-center p-3 mt-4">
        <p class="small">&copy;Todos los derechos reservados a la Escuela Superior de Cómputo</p>
    </div>

    <!--Validacion de formulario por JScript-->
    <script language="javascript" type="text/javascript" src="/../Proyecto WEB/js/script1.js"></script>
    <!--Texto por consola-->
    <script language="javascript" type="text/javascript" src="/../Proyecto WEB/js/script2.js"></script>
    <noscript>El navegador no soporta Javascript</noscript>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="/../Proyecto WEB/js/bootstrap.min.js"></script>
</body>

</html>