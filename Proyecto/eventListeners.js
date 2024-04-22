document.body.addEventListener("load", inicio()); 
document.getElementById("IdentiSiguiente").addEventListener("click", identiSig);
document.getElementById("DomicilioAnterior").addEventListener("click", domiciAnt);
document.getElementById("DomicilioSiguiente").addEventListener("click", domiciSig);
document.getElementById("OtrosAnterior").addEventListener("click", otrosAnt);
document.getElementById("enviar").addEventListener("click", validarTercer);
document.getElementById("direccion").addEventListener("keyup", direccionEnable);
document.getElementById("slctProvincia").addEventListener("change",disableLoc);
