window.addEventListener("load",function(){
    const boton=this.document.getElementById("enviar");
    this.document.getElementById('inputSubmit').onclick=function(ev){
        ev.preventDefault();
        if(this.form.valida()){
            this.form.classList.add("valido");
            this.form.classList.remove("invalido");
        }else{
            this.form.classList.add("invalido");
            this.form.classList.remove("valido");
        }
    }
})