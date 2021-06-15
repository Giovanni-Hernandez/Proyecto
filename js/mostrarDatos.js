window.addEventListener("load", load, false);

function load() {
    document.getElementById("btnRegresar").addEventListener("click", function () { regresar(); });
    document.getElementById("btnContinuar").addEventListener("click", function () { continuar(); });
    document.getElementById("btnModificar").addEventListener("click", function () { modificar(); });

    mostrarIdentidad();

    document.getElementById("btnRegistrar").style.display = "none";

    document.getElementById("fieldsetIdentidad").setAttribute('disabled', '');
    document.getElementById("fieldsetContacto").setAttribute('disabled', '');
    document.getElementById("fieldsetProcedencia").setAttribute('disabled', '');
}

function regresar(){

    let fieldSets = document.getElementsByTagName("fieldset");
    let idFS;

    for (var i=0; i < fieldSets.length; i++) {
        if(fieldSets[i].style.display == 'block' ){
            idFS = fieldSets[i].getAttribute('id');
        }
    }

    if (idFS == 'fieldsetContacto'){
        mostrarIdentidad();
    }
    else if (idFS == 'fieldsetProcedencia'){
        mostrarContacto();
    }
}

function continuar(){

    let fieldSets = document.getElementsByTagName("fieldset");
    let idFS;

    for (var i=0; i < fieldSets.length; i++) {
        if(fieldSets[i].style.display == 'block' ){
            idFS = fieldSets[i].getAttribute('id');
        }
    }

    if (idFS == 'fieldsetIdentidad'){
        mostrarContacto();
    }
    else if (idFS == 'fieldsetContacto'){
        mostrarProcedencia();
    }
}

function modificar(){

    let fieldSets = document.getElementsByTagName("fieldset");
    let idFS;

    for (var i=0; i < fieldSets.length; i++) {
        if(fieldSets[i].style.display == 'block' ){
            idFS = fieldSets[i].getAttribute('id');
        }
    }

    if (idFS == 'fieldsetIdentidad'){
        window.location.replace("formulario.php#identidad");
    }
    else if (idFS == 'fieldsetContacto'){
        window.location.replace("formulario.php#contacto");
    }
    else{
        window.location.replace("formulario.php#procedencia");
    }
}


function mostrarIdentidad(){
    document.getElementById("fieldsetIdentidad").style.display = "block";
    document.getElementById("fieldsetProcedencia").style.display = "none";
    document.getElementById("fieldsetContacto").style.display = "none";

    document.getElementById("btnRegresar").setAttribute('disabled', '');
}

function mostrarProcedencia(){
    document.getElementById("fieldsetIdentidad").style.display = "none";
    document.getElementById("fieldsetProcedencia").style.display = "block";
    document.getElementById("fieldsetContacto").style.display = "none";

    document.getElementById("btnContinuar").setAttribute('disabled', '');
    document.getElementById("btnRegistrar").style.display = "block";
}

function mostrarContacto(){
    document.getElementById("fieldsetIdentidad").style.display = "none";
    document.getElementById("fieldsetProcedencia").style.display = "none";
    document.getElementById("fieldsetContacto").style.display = "block";

    document.getElementById("btnRegresar").removeAttribute('disabled', '');
    document.getElementById("btnContinuar").removeAttribute('disabled', '');
    document.getElementById("btnRegistrar").style.display = "none";
}