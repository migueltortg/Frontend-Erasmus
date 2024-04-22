function validarPrimer() {
    // Obtener los valores de los campos del formulario
    resetError();
    var nombre = document.forms["formulario"]["nombre"].value;
    var email = document.forms["formulario"]["email"].value;
    var contrasena = document.forms["formulario"]["contrasena"].value;
    var correcto = true;

    if(!validaNombre(nombre)){
        correcto = false;
        document.getElementById("nombreError").classList.remove('ocultoError');  
    }

    if(!validaMail(email)){
        correcto = false;
        document.getElementById("emailError").classList.remove('ocultoError');
    }

    if(!validaContrasena(contrasena)){
        correcto = false;
        document.getElementById("passwordError").classList.remove('ocultoError');
    }


    return correcto;
}

function validaNombre(nombre) {
    // Validar que el campo nombre no esté vacío
    if (nombre == "") {
        return false;
    }
    return true;
}

function validaMail(email) {
    var expresionRegularEmail = /\S+@\S+\.\S+/;
    if (!expresionRegularEmail.test(email)) {
        return false;
    }
    return true;
}

function validaContrasena(contrasena) {
    var expresionRegularContr = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
    if (!expresionRegularContr.test(contrasena)) {
        return false;
    }
    return true;
}

async function validarTercer() {
    // Obtener los valores de los campos del formulario
    resetError();
    
    var dni = document.forms["formulario"]["dni"].value;
    var tfno = document.forms["formulario"]["telefono"].value;
    var calendario = document.forms["formulario"]["fecha_nacimiento"].value;
    var correcto = true;

    if(!validaDNI(dni)){
        correcto = false;
        document.getElementById("dniError").classList.remove('ocultoError'); 
    }

    if(!validaTfno(tfno)){
        correcto = false;
        document.getElementById("tfnoError").classList.remove('ocultoError'); 
    }

    if(!validaCalendar(calendario)){
        correcto = false;
        document.getElementById("calendarError").classList.remove('ocultoError'); 
    }

    if(correcto){
        document.getElementById("Otros").classList.add('oculto');
        document.getElementById("Identificacion").classList.remove('oculto');

        document.getElementById("enviado").classList.remove('oculto');

        await delay(5000);
        inicio();
    }else{
        console.log("No se ha enviado el formulario");
    } 

    return correcto;
}

function delay(time){
	return new Promise(resolve => setTimeout(resolve, time));
}

function validaDNI(dni){
    var num = dni.substring(0,8);
    var letr = ["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"];
    const pattern = /^\d{8}[A-Z]$/;

    if((letr[num%23]==dni.substring(8,9) && pattern.test(dni)) || dni==''){
        return true;
    }else{
        document.getElementById("dniError").classList.add('ocultoError');  
        return false;
    }
}

function validaCalendar(fecha){
    var fechaInsert=new Date(fecha);
    var fechaActual=new Date();

    if(fecha == "" || (fechaActual-fechaInsert)/(86400000*365)>14){
        return true;
    }else{
        return false;
    }

}

function validaTfno(tfno){
    const pattern = /^[679]\d{8}$/;

    if(pattern.test(tfno) || tfno==''){
        return true;
    }else{
        return false;
    }
}