$(function(){
    $("#modal").dialog({
        autoOpen: true,
        modal: true,
        draggable: false,
        position: { my: "top", at: "top", of: window },
        width:"90%",
        heigth:"99vh",
        buttons: {
            "Crear Ruta": crearRuta,
            "Crear Ruta y Generar Tours": crearRutaTours
        }
    });

    function crearRuta(){
        if(!validar()){
            crearRutaAPI(crearRutaJSON());
        }else{
            console.log("ERROR");
        }
    }

    function crearRutaJSON(){
        var ruta = {
            nombre: $("#inputTitulo").val(),
            descripcion: $("#textarea").val(),
            foto: new Blob([$('input[type="file"][id^="images-"]')[0].files[0]], { type: $('input[type="file"][id^="images-"]')[0].files[0].type }),
            punto_inicio:"-1,2",
            aforo:"4",
            fecha_inicio:"05/02/2004",
            fecha_fin:"10/02/2004",
            programacion:"hola",
        };

        console.log(ruta);
    }

    function crearRutaAPI(json){
        console.log(json);
    }

    function validar(){
        var validado=true;

        if(!comprobarTab1()){
            validado=false;
        }

        if(!comprobarTab2()){
            validado=false;
        }

        if(!comprobarTab3()){
            validado=false;
        }

        return validado;
    }

    function comprobarTab1(){
        var validado=true;

        $('#tabs-1 input,textarea').each(function(){
            if(($(this).val()=="" || $(this).val()=="<br>" || $(this).val()=="<div><br></div>") && $(this).attr('id')!=="imageURL"
            && $(this).attr('id')!=="fileURL" && $(this).attr('id')!=="fileText" && $(this).attr('id')!=="videoURL" && $(this).attr('id')!=="url"
            && $(this).attr('id')!=="urlText" && $(this).attr('id')!=="tableRows" && $(this).attr('id')!=="tableColumns"){
                if($(this).is("textarea")){
                    $(".richText").css("border","3px solid red");
                    validado=false;
                }else{
                    $(this).css("border","3px solid red");
                    validado=false;
                }
            }else{
                if($(this).is("textarea")){
                    $(".richText").css("border","3px solid green");
                }else{
                    $(this).css("border","3px solid green");
                }
            }
        });

        if($('input[type="file"][id^="images-"]')[0].files.length<1){
            $('#input-images').css("border","3px solid red");
            validado=false;
        }else{
            $('#input-images').css("border","3px solid green");
        }

        if(validado){
            $("#tab-1-li").css("background-color","green");
        }else{
            $("#tab-1-li").css("background-color","red");
        }

        return validado;
    }

    function comprobarTab2(){
        var validado=true;

        if($("#visitasAsignadas").children().length>0){
            $("#tab-2-li").css("background-color","green");
        }else{
            validado=false;
            $("#tab-2-li").css("background-color","red");
        }

        return validado;
    }

    function comprobarTab3(){
        var validado=true;

        if($("#horarios").children().children(1).length>1){
            $("#tab-3-li").css("background-color","green");
        }else{
            validado=false;
            $("#tab-3-li").css("background-color","red");
        }

        return validado;
    }

    function pintarError(boton){
        boton.css("border","3px solid red");
    }

    function pintarCorregido(boton){
        boton.css("border","3px solid green");
    }

    function crearRutaTours(){
        //FUNCION VALIDAR
        //LLAMADA API
        console.log("TOURS Y RUTA");
    }

    $(textarea).richText({
        height: "auto",
        removeStyles:true,
    });

    $('#input-images').imageUploader({
        extensions: ['.jpg','.jpeg','.png'],
    });

    $('#tabs').tabs();

    $("#btnMapa").click(function () {
        var mapa=$('<div id="map"></div>').appendTo('#modal').dialog({
            modal: true,
            width:"90%",        
            draggable: false,
            open: function (event, ui) {
                var mymap = L.map('map').setView([40.2668, -3.6638], 6);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(mymap);

                mymap.on('click', function (e) {
                    var lat = e.latlng.lat;
                    var lng = e.latlng.lng;

                    $("#x").val(lat);
                    $("#y").val(lng);

                    $("#map").remove();
                    $(this).remove(); 
                });
            },
            close: function () {
                $("#map").remove();
                $(this).remove();
            }
        });
        $("#map").parent().css({height: "60vh",top : "15vh"});
        $("#map").css({height: "110%"});

    });

    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '< Ant',
        nextText: 'Sig >',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };

    $.datepicker.setDefaults($.datepicker.regional['es']);
    
    $("#fechaInicio, #fechaFin, #fechaInicioPr, #fechaFinPr").datepicker();

    $("#fechaInicio, #fechaFin").on('change',function(){
        console.log($("#fechaInicio").datepicker("getDate"));
        $("#fechaInicioPr").datepicker("option", "minDate", $("#fechaInicio").datepicker("getDate"));
        $("#fechaInicioPr").datepicker("option", "maxDate", $("#fechaFin").datepicker("getDate"));
        $("#fechaFinPr").datepicker("option", "minDate", $("#fechaInicio").datepicker("getDate"));
        $("#fechaFinPr").datepicker("option", "maxDate", $("#fechaFin").datepicker("getDate"));
    });

    $("#fechaInicioPr").on('change',function(){
        $("#fechaFinPr").datepicker("option", "minDate", $("#fechaInicioPr").datepicker("getDate"));
    });

    $("#fechaFinPr").on('change',function(){
        $("#fechaInicioPr").datepicker("option", "maxDate", $("#fechaFinPr").datepicker("getDate"));
    });

    $("#aforo").spinner({
        min:1
    });

    $( "ul#visitasDisponibles" ).sortable({
        connectWith: "ul"
    });

    $( "ul#visitasAsignadas" ).sortable({
    connectWith: "ul"
    });

    
    
    $("#btnAñadir").click(function(){
        agregarFila();
    });



    function agregarFila() {
        var rangoFecha = $("#fechaInicioPr").val() + " - " + $("#fechaFinPr").val();
        var dias = obtenerDiasSeleccionados();
        var hora = $("#hora").val();
        var persona = $("#personas").val();
  
        var fila = "<tr><td>" + rangoFecha + "</td><td>" + dias + "</td><td>" + hora + "</td><td>" + persona + "</td></tr>";
        $("#horarios tbody").append(fila);
    }
  
    function obtenerDiasSeleccionados() {
        var diasSeleccionados = [];
        $("#diasSemana input[type='checkbox']:checked").each(function() {
            diasSeleccionados.push($(this).val());
        });
        return diasSeleccionados.join(", ");
    }


    $(""); 
});