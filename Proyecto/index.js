function inicio() {
    reset();
    document.getElementById("enviado").classList.add('oculto');
    document.getElementById("Identificacion").classList.remove('oculto');
    document.getElementById("Domicilio").classList.add('oculto');
    document.getElementById("Otros").classList.add('oculto');
    document.getElementById("1img").classList.add('imgEncendido');
    document.getElementById("2img").classList.remove('imgEncendido');
    document.getElementById("3img").classList.remove('imgEncendido');
    document.getElementById("slctProvincia").classList.add('disabled');
    document.getElementById("slctLocalidad").classList.add('disabled');   
    document.getElementById("nombreError").classList.add('ocultoError');
    document.getElementById("passwordError").classList.add('ocultoError');
    document.getElementById("emailError").classList.add('ocultoError');  
    document.getElementById("dniError").classList.add('ocultoError');  
    document.getElementById("calendarError").classList.add('ocultoError');  
    cargarDirecciones();
}

function reset(){
    document.forms["formulario"]["nombre"].value='';
    document.forms["formulario"]["contrasena"].value='';
    document.forms["formulario"]["email"].value='';
    document.forms["formulario"]["direccion"].value='';
    document.forms["formulario"]["slctProvincia"].value='';
    document.forms["formulario"]["slctLocalidad"].value='';
    document.forms["formulario"]["fecha_nacimiento"].value='';
    document.forms["formulario"]["dni"].value='';
    document.forms["formulario"]["telefono"].value='';
    document.getElementById("masculino").checked=false;
    document.getElementById("femenino").checked=false;
}


function identiSig() {
    if(validarPrimer()){
        document.getElementById("Domicilio").classList.remove('oculto');
        document.getElementById("Identificacion").classList.add('oculto');
        document.getElementById("1img").classList.remove('imgEncendido');
        document.getElementById("2img").classList.add('imgEncendido');
    }
}

function domiciAnt() {
    document.getElementById("Domicilio").classList.add('oculto');
    document.getElementById("Identificacion").classList.remove('oculto');
    document.getElementById("2img").classList.remove('imgEncendido');
    document.getElementById("1img").classList.add('imgEncendido');
}

function domiciSig() {
    var direc = document.getElementById("direccion").value; 
    document.getElementById("Domicilio").classList.add('oculto');
    document.getElementById("Otros").classList.remove('oculto');
    document.getElementById("2img").classList.remove('imgEncendido');
    document.getElementById("3img").classList.add('imgEncendido');
}

function otrosAnt() {
    document.getElementById("Otros").classList.add('oculto');
    document.getElementById("Domicilio").classList.remove('oculto');
    document.getElementById("3img").classList.remove('imgEncendido');
    document.getElementById("2img").classList.add('imgEncendido');
}

function resetError(){  
    document.getElementById("nombreError").classList.add('ocultoError');
    document.getElementById("passwordError").classList.add('ocultoError');
    document.getElementById("emailError").classList.add('ocultoError'); 
    document.getElementById("tfnoError").classList.add('ocultoError');  
    document.getElementById("dniError").classList.add('ocultoError'); 
}