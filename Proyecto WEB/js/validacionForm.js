function valiBoleta(e) {

    var key = e.keyCode || e.wich,
        tecla = String.fromCharCode(key).toLocaleUpperCase(),
        letras = "PE0123456789";
    if (letras.indexOf(tecla) == -1) {
        return false;
    }
}

function soloLetras(e) {
    var key = e.keyCode || e.which,
        tecla = String.fromCharCode(key).toLowerCase(),
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
        no = ".%";


    if (letras.indexOf(tecla) == -1 && no.indexOf(tecla) != -1) {
        return false;
    }
}

function letrasNumeros(e) {
    var key = e.keyCode || e.which,
        tecla = String.fromCharCode(key).toLowerCase(),
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz0123456789-.()#",
        no = "%";


    if (letras.indexOf(tecla) == -1 && no.indexOf(tecla) != -1) {
        return false;
    }
}