<?php

    session_start();

    $_SESSION["boleta"] = $_POST["boleta"];
    $_SESSION["nombre"] = $_POST["nombre"];
    $_SESSION["apellidop"] = $_POST["apellidop"];
    $_SESSION["apellidom"] = $_POST["apellidom"];
    $_SESSION["fecha"] = $_POST["fecha"];
    $_SESSION["curp"] = $_POST["curp"];
    $_SESSION["Sexo"] = $_POST['Sexo'];
    $_SESSION["calleynum"] = $_POST["calleynum"];
    $_SESSION["col"] = $_POST["col"];
    $_SESSION["postal"] = $_POST["postal"];
    $_SESSION["tel"] = $_POST["tel"];
    $_SESSION["correo"] = $_POST["correo"];
    $_SESSION["dircor"] = $_POST["dircor"];
    $_SESSION["escuela"] = $_POST["escuela"];
    $_SESSION["estado"] = $_POST["estado"];
    $_SESSION["escNombreTxt"] = $_POST["escNombreTxt"];
    $_SESSION["escPromedio"] = $_POST["escPromedio"];
    $_SESSION["opcionEscom"] = $_POST["opcionEscom"];

    $_SESSION["modificacion"] = "activado";
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
<script type="text/javascript" src="/../Proyecto WEB/js/validacionForm.js"></script>
<script type="text/javascript" src="/../Proyecto WEB/js/mostrarDatos.js"></script>
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
            <span>
                <div class='console-underscore'>Verifica tus datos</div>
            </span>
        </div>
        <div class="col text-center mt-4">
            <a href="/../Proyecto WEB/index.html" class="btn btn-success mr-3 mb-3" role="button"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
        </div>
    </div>

    <!--Caja de contacto-->
    <div class="contact-box ">
        <div class="container p-6 bg-dark ">
            <div class="user-img">
                <img src="/../Proyecto WEB/img/estudiante.png" class="img-fluid img-thumbnail rounded-circle mx-auto d-block zoom " alt="ESCOM ">
            </div>

            <!--Formulario-->
            <form action="/../Proyecto WEB/php/InsertarMySQL.php" method="POST" enctype="multipart/form-data" class="needs-validation" autocomplete="off " novalidate onsubmit="return validacion()">
                <fieldset id="fieldsetIdentidad">
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
                </fieldset>

                    <fieldset id="fieldsetContacto" class="mt-5 ">
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
                                            <option selected <?php echo 'value = "'.$_SESSION['dircor'].'"'; ?>><?php echo $_SESSION['dircor']; ?></option>    
                                        </select>
                                    </div>
                                    <div class="valid-feedback ">¡Válido!</div>
                                    <div class="invalid-feedback ">Proporcione un correo electrónico válido</div>
                                </div> <!--Finaliza el input-group-->
                            </div><!--Finaliza el form-group col-lg-8-->
                        </div>
                    </fieldset>

                    <fieldset id ="fieldsetProcedencia" class="mt-5 ">
                        <legend class="font-weight-bold " id="procedencia">Procedencia</legend>
                        <div class="row mt-3 ">
                            <div class="form-group col-lg-6 ">
                                <label for="escuela ">Escuela de procedencia<span class="text-danger ">*</span></label>
                                <select class="form-control " id="escuela" name="escuela" required>
                                    <option selected <?php echo 'value = "'.$_SESSION['escuela'].'"'; ?>><?php echo $_SESSION['escuela']; ?></option>
                                </select>
                                <div class="valid-feedback" id="valEsc">¡Ok!</div>
                                <div class="invalid-feedback" id="valNoEsc">Por favor, seleccione una escuela de procedencia</div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="estado">Entidad federativa de procedencia<span class="text-danger">*</span></label>
                                <select class="form-control" id="estado" name="estado" required> 
                                    <option selected <?php echo 'value = "'.$_SESSION['estado'].'"'; ?>><?php echo $_SESSION['estado']; ?></option>
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
                                <select class="form-control" id="opcionEscom" name="opcionEscom" required>
                                    <option selected <?php echo 'value = "'.$_SESSION['opcionEscom'].'"'; ?>><?php echo $_SESSION['opcionEscom']; ?></option>
                                </select>
                                <div class="valid-feedback" id="valEscom">¡Ok!</div>
                                <div class="invalid-feedback" id="valNoEscom">Por favor, seleccione una opción</div>
                            </div>
                        </div>
                    </fieldset>
                    
                    <input id ="btnRegresar" type="button" class="btn btn-outline-light btn-lg mt-4" value="Retroceder" />
                    <input id ="btnContinuar" type="button" class="btn btn-outline-light btn-lg mt-4" style="float: right;" value="Continuar" onclick="mostrarCampo();" />
                    <input id ="btnModificar" type="button" class="btn btn-primary btn-lg btn-block mt-4" value="Modificar" />
                    <input id ="btnRegistrar" type="submit" class="btn btn-primary btn-lg btn-block mt-4 btn-success" value="Registrarme" />
            </form>
            <small class="d-inline-block text-muted mt-2">Instituto Politécnico Nacional | Escuela Superior de Cómputo | 2021</small>
        </div>
    </div>

    <!--Footer-->
    <div class="container-fluid bg-dark text-center p-3 mt-4">
        <p class="small">&copy;Todos los derechos reservados a la Escuela Superior de Cómputo</p>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="/../Proyecto WEB/js/bootstrap.min.js"></script>
</body>

</html>