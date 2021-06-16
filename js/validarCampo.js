function valCampo() {
    var boleta = document.getElementById("txtnumero").value;

    if (boleta == null || boleta.length == 0 || /^\s+$/.test(boleta)) {
        alert("Introduzca un número de boleta valido");
        return false;
    }

    for (var i = 0; i < boleta.length; i++) {
        if (boleta[i] == "P" || boleta[i] == "E") {
            var bandera = 1;
            break;
        }
    }

    if (bandera == 1) {
        if (boleta[0] != "P" && boleta[1] != "E") {
            alert("Introduzca un número de boleta valido");
            return false;
        }
    }


}