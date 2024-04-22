function direccionEnable(){
    var text = document.forms["formulario"]["direccion"].value;
    if(text!=''){
        document.getElementById("slctProvincia").classList.remove('disabled');
    }else{
        document.getElementById("slctLocalidad").classList.add('disabled');
        document.getElementById("slctProvincia").classList.add('disabled');
    }
}

function cargarDirecciones(){
    var ajax=new XMLHttpRequest();
    var provinc = document.getElementById("slctProvincia");
    ajax.open('get', 'data.xml');
    ajax.onreadystatechange=function(){
	if ( ajax.readyState==4 && ajax.status==200){
		var respuesta=ajax.responseXML;
        var prov="";
		var entradas=respuesta.getElementsByTagName("provincia");
        prov += "<option> </option>";
		for (let i=0;i<entradas.length;i++){
            prov += "<option>" + entradas[i].getElementsByTagName("nombre")[0].childNodes[0].nodeValue + "</option>"; 
		}
        provinc.innerHTML = prov;
	}
  }
  ajax.send();
}

function cargarLoc(){
    var provinciaNombre = document.getElementById("slctProvincia").value;
    var ajax=new XMLHttpRequest();
    var loc = document.getElementById("slctLocalidad");
    ajax.open('get', 'data.xml');
    ajax.onreadystatechange=function(){
	if ( ajax.readyState==4 && ajax.status==200){
		var respuesta=ajax.responseXML;
        var local="";
		var provincias=respuesta.getElementsByTagName("provincia");
		for (let i=0;i<provincias.length;i++){
            if(provincias[i].getElementsByTagName("nombre")[0].textContent == provinciaNombre){
                var localidades = provincias[i].getElementsByTagName("localidad");
                for(let a=0;a<localidades.length;a++){
                    localidad = localidades[a].textContent;
                    local += "<option value='"+localidad+"' >" + localidad + "</option>"; 
                }
            }
        }
        loc.innerHTML = local;
	}
  }
  ajax.send();
}

function disableLoc(){
    document.getElementById("slctLocalidad").classList.remove('disabled');
    cargarLoc();
}