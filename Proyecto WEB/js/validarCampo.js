function valCampo() {
    var txt = document.getElementById("txtnumero").value;

    if (txt == null || txt.length == 0 || /^\s+$/.test(txt)) {
        alert("Introduzca un número de boleta valido");
        return false;
    }


}