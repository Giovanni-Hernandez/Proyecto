function validacion() {
    var boleta = document.getElementById("boleta").value;
    var nombre = document.getElementById("nombre").value;
    var apPat = document.getElementById("apellidop").value;
    var apMat = document.getElementById("apellidom").value;
    var fecha = document.getElementById("fecha").value;
    var CURP = document.getElementById("curp").value;
    var calleynum = document.getElementById("calleynum").value;
    var colonia = document.getElementById("col").value;
    var codigo = document.getElementById("postal").value;
    var telefono = document.getElementById("tel").value;
    var correo = document.getElementById("correo").value;
    var escuela = document.getElementById("escuela").selectedIndex;
    var estado = document.getElementById("estado").selectedIndex;
    var escProme = document.getElementById("escPromedio").value;
    var opcionEsc = document.getElementById("opcionEscom").selectedIndex;


    //Creando una vairable de la fecha
    const fechas = new Date();
    const dia = fechas.getDate();
    const mes = fechas.getMonth() + 1;
    const ano = fechas.getFullYear();
    var fechaIntro = fecha.toString();
    anoIntro = fechaIntro[0] + fechaIntro[1] + fechaIntro[2] + fechaIntro[3];
    mesIntro = fechaIntro[5] + fechaIntro[6];
    diaIntro = fechaIntro[8] + fechaIntro[9];
    boleta = boleta.toUpperCase();


    //Validacion del nombre
    if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
        alert("El campo nombre no puede estar vacío, verifícalo");
        return false;
    }

    //Validacion del apellido Paterno
    if (/^\s+$/.test(apPat) || apPat == null || apPat.length == 0) {
        alert("El campo Apellido Paterno no puede estar vacío, verifícalo");
        return false;
    }

    //Validacion del apellido materno
    if (apMat == null || apMat.length == 0 || /^\s+$/.test(apMat)) {
        alert("El campo Apellido Materno no puede estar vacío, verifícalo");
        return false;
    }

    //Validacion de la fecha
    if ((anoIntro >= ano && mesIntro >= mes && diaIntro >= dia) || fecha == "" || fecha.length != 10) {
        alert("Verifique la fecha introducida");
        return false;
    }

    //Validar CURP
    if (CURP.length < 18) {
        alert("Verifique su CURP");
        return false;
    }

    //Validar Calle
    if (calleynum == null || calleynum.length == 0 || /^\s+$/.test(calleynum)) {
        alert("El campo Calle y Número no puede estar vacío, verifícalo");
        return false;
    }

    //Validar Colonia
    if (colonia == null || colonia.length == 0 || /^\s+$/.test(colonia)) {
        alert("El campo Colonia no puede estar vacío, verifícalo");
        return false;
    }

    //Validar Codigo postal
    if (codigo == null || codigo.length == 0 || /^\s+$/.test() || codigo.length < 5) {
        alert("El campo Código Postal no contiene 5 digitos, verifíquelo");
        return false;
    }

    //Validar telefono
    if (telefono == null || telefono.length == 0 || /^\s+$/.test(telefono) || telefono.length < 10) {
        alert("El campo Teléfono o celular, no contiene 10 digitos, verificalo");
        return false;
    }

    //Validar correo
    if (correo == null || correo.length == 0 || /^\s+$/.test(correo)) {
        alert("El campo Correo Electrónico no puede estar vacío, verifícalo");
        return false;
    }

    //Validar escuela
    if (escuela == null || escuela == 0) {
        alert("Seleccione la escuela de procedencia");
        return false;
    }

    //Validacion entidad 
    if (estado == null || estado == 0) {
        alert("Seleccione un estdo de procedencia");
        return false;
    }


    if (escProme == null || escProme.length == 0 || /^\s+$/.test(escProme)) {
        alert("El campo Promedio de la escuela no puede estar vacío, verificalo");
        return false;
    }

    //Entro un numero 
    if (escProme != null || escProme.length != 0) {
        var puntos = 0;
        for (var i = 0; i < escProme.length; i++) {
            if (escProme[i] == ".") {
                puntos++;
            }
        }
        if (puntos > 1 || escProme < 6 || escProme > 10) {
            alert("El valor introduido en el campo promedio es erroneo, verificalo");
            return false;
        }
    }


    //Validacion ESCOM Fue
    if (opcionEsc == null || opcionEsc == 0) {
        alert("Seleccione la opción de ESCOM");
        return false;
    } else {
        return true;
    }

}

function numBoleta() {
    var boleta = document.getElementById("boleta").value;
    var contP = 0,
        contE = 0;
    boleta = boleta.toUpperCase();
    //Validacion de la boleta
    for (var i = 0; i < boleta.length; i++) {
        if (boleta[i] == "P" || boleta[i] == "E") {
            if (boleta[i] == "P") {
                contP++;
            }
            if (boleta[i] == "E") {
                contE++;
            }
            var bandera = 1;

        }
    }

    if (bandera == 1) {
        if ((boleta[0] != "P" || boleta[1] != "E")) {
            if (boleta[1] != "P") {
                //alert("Verifique su número de boleta");
                document.getElementById("bolvali").style.display = "none";
                document.getElementById("bolnovali").style.display = "block";
                document.getElementById("boleta").style.borderColor = "#dc3545";
            }
        }

        if ((boleta[0] != "P" || boleta[1] != "E") || contE != 1 || contP != 1) {
            document.getElementById("bolvali").style.display = "none";
            document.getElementById("bolnovali").style.display = "block";
            document.getElementById("boleta").style.borderColor = "#dc3545";
        }

    }

    if (boleta.length < 10 || boleta == "BOLETA") {
        //alert("Verifique su número de boleta");
        document.getElementById("bolvali").style.display = "none";
        document.getElementById("bolnovali").style.display = "block";
        document.getElementById("boleta").style.borderColor = "#dc3545";
    }

    if (((boleta.length == 10 && boleta[0] == "P" && boleta[1] == "E")) && (contE == 1 && contP == 1)) {
        document.getElementById("bolvali").style.display = "block";
        document.getElementById("bolnovali").style.display = "none";
        document.getElementById("boleta").style.borderColor = "#28a745";
    }

    if (((boleta.length == 10 && boleta[0] == "P" && boleta[1] == "P")) && contP == 2) {
        document.getElementById("bolvali").style.display = "block";
        document.getElementById("bolnovali").style.display = "none";
        document.getElementById("boleta").style.borderColor = "#28a745";
    }


    if (boleta.length == 10 && contE == 0 && contP == 0) {
        document.getElementById("bolvali").style.display = "block";
        document.getElementById("bolnovali").style.display = "none";
        document.getElementById("boleta").style.borderColor = "#28a745";
    }
}

function promedio() {
    var escProme = document.getElementById("escPromedio").value;

    if (escProme == null || escProme.length == 0 || /^\s+$/.test(escProme) || escProme < 6 || escProme > 10) {
        document.getElementById("valPro").style.display = "none";
        document.getElementById("valNoPro").style.display = "block";
        document.getElementById("escPromedio").style.borderColor = "#dc3545";
    }

    if (escProme != null || escProme.length != 0) {
        var puntos = 0;
        for (var i = 0; i < escProme.length; i++) {
            if (escProme[i] == ".") {
                puntos++;
            }
        }
        if (puntos > 1 || escProme < 6 || escProme > 10) {
            document.getElementById("valPro").style.display = "none";
            document.getElementById("valNoPro").style.display = "block";
            document.getElementById("escPromedio").style.borderColor = "#dc3545";
        }
    }


    if (escProme != null && escProme.length != 0 && puntos < 2 && (escProme >= 6 && escProme <= 10)) {
        document.getElementById("valPro").style.display = "block";
        document.getElementById("valNoPro").style.display = "none";
        document.getElementById("escPromedio").style.borderColor = "#28a745";
    }


}

function valEscuela() {

    var escuela = document.getElementById("escuela").selectedIndex;
    if (escuela == null || escuela == 0) {

        document.getElementById("valEsc").style.display = "none";
        document.getElementById("valNoEsc").style.display = "block";
        document.getElementById("escuela").style.borderColor = "#dc3545";

    }

    if (escuela != null && escuela != 0) {
        document.getElementById("valEsc").style.display = "block";
        document.getElementById("valNoEsc").style.display = "none";
        document.getElementById("escuela").style.borderColor = "#28a745";
    }

}

function valEstado() {

    var estado = document.getElementById("estado").selectedIndex;
    if (estado == null || estado == 0) {

        document.getElementById("valEsta").style.display = "none";
        document.getElementById("valNoEsta").style.display = "block";
        document.getElementById("estado").style.borderColor = "#dc3545";
    }

    if (estado != null && estado != 0) {
        document.getElementById("valEsta").style.display = "block";
        document.getElementById("valNoEsta").style.display = "none";
        document.getElementById("estado").style.borderColor = "#28a745";
    }
}


function validarSelects() {

    var opcionEsc = document.getElementById("opcionEscom").selectedIndex;

    if (opcionEsc == null || opcionEsc == 0) {

        document.getElementById("valEscom").style.display = "none";
        document.getElementById("valNoEscom").style.display = "block";
        document.getElementById("opcionEscom").style.borderColor = "#dc3545";
    }

    if (opcionEsc != null && opcionEsc != 0) {
        document.getElementById("valEscom").style.display = "block";
        document.getElementById("valNoEscom").style.display = "none";
        document.getElementById("opcionEscom").style.borderColor = "#28a745";
    }
}

function valiNombre() {
    var nombre = document.getElementById("nombre").value;

    //Validacion del nombre
    if (/^\s+$/.test(nombre) || nombre == null || nombre.length < 2) {
        document.getElementById("nomval").style.display = "none";
        document.getElementById("nomNoval").style.display = "block";
        document.getElementById("nombre").style.borderColor = "#dc3545";
    } else if (nombre != null && nombre.length > 2) {
        document.getElementById("nomval").style.display = "block";
        document.getElementById("nomNoval").style.display = "none";
        document.getElementById("nombre").style.borderColor = "#28a745";
    }

}

function valiApPat() {

    var apellidop = document.getElementById("apellidop").value;

    if (/^\s+$/.test(apellidop) || apellidop == null || apellidop.length < 2) {
        document.getElementById("apepvali").style.display = "none";
        document.getElementById("apepnovali").style.display = "block";
        document.getElementById("apellidop").style.borderColor = "#dc3545";
    } else if (apellidop != null && apellidop.length > 2) {
        document.getElementById("apepvali").style.display = "block";
        document.getElementById("apepnovali").style.display = "none";
        document.getElementById("apellidop").style.borderColor = "#28a745";
    }
}

function valiApMat() {

    var apellidom = document.getElementById("apellidom").value;

    if (/^\s+$/.test(apellidom) || apellidom == null || apellidom.length < 2) {
        document.getElementById("apmatval").style.display = "none";
        document.getElementById("apmatnoval").style.display = "block";
        document.getElementById("apellidom").style.borderColor = "#dc3545";
    } else if (apellidom != null && apellidom.length > 2) {
        document.getElementById("apmatval").style.display = "block";
        document.getElementById("apmatnoval").style.display = "none";
        document.getElementById("apellidom").style.borderColor = "#28a745";
    }
}

function valiFechaNac() {
    //Validacion de la fecha
    const fechas = new Date();
    const dia = fechas.getDate();
    const mes = fechas.getMonth() + 1;
    const ano = fechas.getFullYear();
    var fecha = document.getElementById("fecha").value;
    var fechaIntro = fecha.toString();
    anoIntro = fechaIntro[0] + fechaIntro[1] + fechaIntro[2] + fechaIntro[3];
    mesIntro = fechaIntro[5] + fechaIntro[6];
    diaIntro = fechaIntro[8] + fechaIntro[9];

    if ((anoIntro >= ano && mesIntro >= mes && diaIntro >= dia) || fecha == "" || fecha.length != 10 || anoIntro <= 1950 || anoIntro >= ano) {
        document.getElementById("fechaval").style.display = "none";
        document.getElementById("fechanoval").style.display = "block";
        document.getElementById("fecha").style.borderColor = "#dc3545";
    } else if (anoIntro < ano && fecha != "" && fecha.length == 10) {
        document.getElementById("fechaval").style.display = "block";
        document.getElementById("fechanoval").style.display = "none";
        document.getElementById("fecha").style.borderColor = "#28a745";
    }

}

function valCalle() {

    var calleynum = document.getElementById("calleynum").value;

    if (/^\s+$/.test(calleynum) || calleynum == null || calleynum.length < 2) {
        document.getElementById("calleval").style.display = "none";
        document.getElementById("callenoval").style.display = "block";
        document.getElementById("calleynum").style.borderColor = "#dc3545";
    } else if (calleynum != null && calleynum.length > 2) {
        document.getElementById("calleval").style.display = "block";
        document.getElementById("callenoval").style.display = "none";
        document.getElementById("calleynum").style.borderColor = "#28a745";
    }

}

function valColonia() {

    var col = document.getElementById("col").value;

    if (/^\s+$/.test(col) || col == null || col.length < 2) {
        document.getElementById("colval").style.display = "none";
        document.getElementById("colnoval").style.display = "block";
        document.getElementById("col").style.borderColor = "#dc3545";
    } else if (col != null && col.length > 2) {
        document.getElementById("colval").style.display = "block";
        document.getElementById("colnoval").style.display = "none";
        document.getElementById("col").style.borderColor = "#28a745";
    }

}

function valCodigo() {

    var postal = document.getElementById("postal").value;

    if (/^\s+$/.test(postal) || postal == null || postal.length < 5) {
        document.getElementById("codval").style.display = "none";
        document.getElementById("codnoval").style.display = "block";
        document.getElementById("postal").style.borderColor = "#dc3545";
    } else if (postal != null && postal.length == 5) {
        document.getElementById("codval").style.display = "block";
        document.getElementById("codnoval").style.display = "none";
        document.getElementById("postal").style.borderColor = "#28a745";
    }

}

function valTele() {

    var tel = document.getElementById("tel").value;;

    if (/^\s+$/.test(tel) || tel == null || tel.length < 10) {
        document.getElementById("telval").style.display = "none";
        document.getElementById("telnoval").style.display = "block";
        document.getElementById("tel").style.borderColor = "#dc3545";
    } else if (tel != null && tel.length == 10) {
        document.getElementById("telval").style.display = "block";
        document.getElementById("telnoval").style.display = "none";
        document.getElementById("tel").style.borderColor = "#28a745";
    }
}